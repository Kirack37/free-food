@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="my-4">Ingredientes en Bodega</h1>

        <div class="row">
            @foreach ($ingredientesBodega as $ingredienteBodega)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ingredienteBodega->ingrediente->nombre }}</h5>
                            <p class="card-text">Cantidad en bodega: {{ $ingredienteBodega->cantidad_disponible }}</p>
                            <img class="card-img-top"
                                src="{{ asset($ingredienteBodega->ingrediente->image_path) }}"
                                alt="{{ $ingredienteBodega->ingrediente->nombre }}"
                            >
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
