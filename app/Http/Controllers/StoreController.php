<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $ingredientsStore = Store::with('ingredient')->get();

        return view('store.index', compact('ingredientsStore'));
    }
}
