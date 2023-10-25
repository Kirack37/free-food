<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Receta;
use Illuminate\Http\Request;
use App\Models\HistorialRecetas;
use App\Models\RecetaIngrediente;

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
        dd($ingredientesSuficientes);

        // Devolvemos la respuesta según haya o no ingredientes
        return response()->json(['receta' => $recetaElegida, 'ingredientesSuficientes' => $ingredientesSuficientes]);
    }

    private function elegirRecetaAleatoria()
    {
        $recetas = Receta::all()->toArray();
        return $recetas[array_rand($recetas)];
    }

    private function comprobarIngredientes($receta)
    {
        // Lógica para comprobar si tenemos los ingredientes necesarios
        $ingredientesReceta = RecetaIngrediente::where('receta_id', $receta)->get();
        if(isset($ingredientesReceta)) {
            // Comprobamos en la bodega
            foreach($ingredientesReceta as $ingredienteReceta) {
                $ingredienteBodega = Bodega::where('ingrediente_id', $ingredienteReceta->id)->first();
                // Comprobamos que el ingrediente exista en la bodega
                if(isset($ingredienteBodega)) {
                    if($ingredienteReceta->cantidad < $ingredienteBodega->cantidad_disponible) {
                        return false;
                    }
                }
            }
        }
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
