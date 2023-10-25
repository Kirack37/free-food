@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="my-4">Recetas</h1>

        <div class="row">
            @foreach ($recetas as $receta)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $receta->nombre }}</h5>
                            <p class="card-text">{{ $receta->descripcion }}</p>
                            <p class="card-text">Dificultad: {{ $receta->dificultad }}</p>
                            <p class="card-text">Tiempo de preparación: {{ $receta->tiempo_preparacion }} minutos</p>
                            <img class="card-img-top" src="{{ asset($receta->image_path) }}" alt="{{ $receta->nombre }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
