<?php

namespace App\Http\Controllers;

use App\Models\Pisua;
use App\Jobs\SyncPisuaToOdoo;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class PisoController extends Controller
{
    // Muestra la vista Blade
    public function create()
    {
        return Inertia::render('pisua/sortu');
    }

    // Procesa el formulario
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pisuaren_izena' => 'required|string|max:255',
            'pisuaren_kodigoa' => 'required|string|max:50',
        ]);

        $pisua = Pisua::create([
            'izena' => $validated['pisuaren_izena'],
            'kodigoa' => $validated['pisuaren_kodigoa'],
            'synced' => false 
        ]);
        
    }
}