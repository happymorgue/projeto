<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObjetoE;

class ObjetosAchadosController extends Controller
{
    public function index()
    {
        $objetosAchados = ObjetoE::all();
        dd($objetosAchados); // Dump retrieved data for debugging
        return view('objAchadosPolicia', compact('objetosAchados'));
    }
    
}
