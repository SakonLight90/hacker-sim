<?php

namespace App\Http\Controllers;

use App\Models\Adware;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class AdwareController extends Controller
{
    // Mostra AdWare piazzati e ricevuti
    public function index()
    {
        $user = Auth::user();
        $planted = Adware::where('source_user_id', $user->id)->where('active', true)->with('target')->get();
        $received = Adware::where('target_user_id', $user->id)->where('active', true)->with('planter')->get();

        return view('adware.index', [
            'planted' => $planted,
            'received' => $received
        ]);
    }

    // PIAZZA un AdWare su un bersaglio (se limiti rispettati)
    public function plant(Request $request)
    {
        $user = Auth::user();
        $target = User::where('username', $request->input('target'))->first();

        if (!$target) {
            return back()->with('error', 'Utente bersaglio non trovato.');
        }
        if ($target->id == $user->id) {
            return back()->with('error', 'Non puoi piazzare AdWare su te stesso.');
        }

        // Limite: max 100 bersagli infettati
        $plantedCount = Adware::where('source_user_id', $user->id)->where('active', true)->count();
        if ($plantedCount >= 100) {
            return back()->with('error', 'Limite massimo di 100 AdWare piazzati raggiunto.');
        }

        // Il bersaglio può ricevere solo 1 adware da te
        $already = Adware::where('source_user_id', $user->id)
            ->where('target_user_id', $target->id)
            ->where('active', true)
            ->first();
        if ($already) {
            return back()->with('error', 'Hai già piazzato un AdWare su questo bersaglio.');
        }

        // Il bersaglio può ricevere al massimo 100 AdWare totali (da chiunque)
        $targetAdwareCount = Adware::where('target_user_id', $target->id)->where('active', true)->count();
        if ($targetAdwareCount >= 100) {
            return back()->with('error', 'Questo utente ha già 100 AdWare attivi.');
        }

        Adware::create([
            'source_user_id' => $user->id,
            'target_user_id' => $target->id,
            'planted_at' => Carbon::now(),
            'active' => true
        ]);

        return back()->with('success', "AdWare piazzato su {$target->username}!");
    }

    // RIMUOVE un AdWare (solo se sei il bersaglio)
    public function remove($id)
    {
        $user = Auth::user();
        $adware = Adware::where('id', $id)
            ->where('target_user_id', $user->id)
            ->where('active', true)
            ->firstOrFail();

        // Rimozione AdWare: disattiva
        $adware->active = false;
        $adware->removed_at = now();
        $adware->save();

        return back()->with('success', 'AdWare rimosso!');
    }
}
