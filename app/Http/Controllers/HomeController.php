<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistorialRecetas;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lógica para obtener el historial de pedidos
        $historialPedidos = $this->obtenerHistorialPedidos();

        return view('home', ['historialPedidos' => $historialPedidos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pedirPlato()
    {
        // Lógica para elegir aleatoriamente una receta
        $recetaElegida = $this->elegirRecetaAleatoria();

        // Lógica para comprobar si disponemos de los ingredientes
        $ingredientesSuficientes = $this->comprobarIngredientes($recetaElegida);

        // Devolvemos la respuesta según haya o no ingredientes
        return response()->json(['receta' => $recetaElegida, 'ingredientesSuficientes' => $ingredientesSuficientes]);
    }

    private function elegirRecetaAleatoria()
    {
        // TODO: LLamar de base de datos
        $recetas = ['Receta1', 'Receta2', 'Receta3', 'Receta4', 'Receta5', 'Receta6'];
        return $recetas[array_rand($recetas)];
    }

    private function comprobarIngredientes($receta)
    {
        // Lógica para comprobar si tenemos los ingredientes necesarios
        // Devolvemos true si tenemos los ingredientes, false de lo contrario
        return true;
    }
    private function obtenerHistorialPedidos()
    {
        // Historial de pedidos sin realizar
        $historialPedidos = HistorialRecetas::where('realizado', 0)->get();
        $pedidos = [];
        foreach ($historialPedidos as $pedido) {
            $pedidos[] = $pedido->receta->nombre;
        }

        return $pedidos;
    }
}
