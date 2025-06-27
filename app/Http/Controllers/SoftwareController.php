<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Software;
use Illuminate\Support\Facades\Auth;

class SoftwareController extends Controller
{
    /**
     * Show all software levels for the authenticated user.
     */
    public function index()
    {
        $software = Auth::user()->software()->get();
        return view('software.index', compact('software'));
    }

    /**
     * Upgrade specific software for the authenticated user.
     */
    public function upgrade($type)
    {
        $user = Auth::user();
        $software = $user->software()->where('type', $type)->firstOrFail();

        // Example upgrade cost: 1000 * current level
        $cost = $software->level * 1000;

        if ($user->money_clean < $cost) {
            return back()->with('error', 'Fondi insufficienti!');
        }

        $user->money_clean -= $cost;
        $user->save();

        $software->level += 1;
        $software->save();

        return back()->with('success', ucfirst($type).' aggiornato al livello '.$software->level.'!');
    }
}
