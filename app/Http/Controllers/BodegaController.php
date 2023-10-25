<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    public function index()
    {
        $ingredientesBodega = Bodega::with('ingrediente')->get();

        return view('bodega.index', compact('ingredientesBodega'));
    }
}
