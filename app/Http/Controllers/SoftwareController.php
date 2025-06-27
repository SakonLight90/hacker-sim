<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Software;
use Illuminate\Support\Facades\Auth;

class SoftwareController extends Controller
{
    // Mostra tutti i software e livelli dell'utente loggato
    public function index()
    {
        $software = Auth::user()->software()->get();
        return view('software.index', compact('software'));
    }

    // Esegui upgrade di uno specifico software
    public function upgrade($type)
    {
        $user = Auth::user();
        $software = $user->software()->where('type', $type)->firstOrFail();

        // Esempio: costo upgrade, puoi modularlo
        $cost = $software->level * 1000;

        if ($user->money_clean < $cost) {
            return back()->with('error', 'Fondi insufficienti!');
        }

        $user->money_clean -= $cost;
        $user->save();

        $software->level += 1;
        $software->save();

        return back()->with('success', 'Upgrade effettuato!');
    }
}
