<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MercadoController extends Controller
{
    public function comprarIngrediente($ingrediente)
    {
        // Realizamos la solicitud a la API proporcionada
        $response = Http::get('https://recruitment.alegra.com/api/farmers-market/buy', [
            'ingredient' => $ingrediente,
        ]);

        // Devolvemos la respuesta en formato json
        $data = $response->json();

        return view('compra', ['respuesta' => $data]);
    }
}
