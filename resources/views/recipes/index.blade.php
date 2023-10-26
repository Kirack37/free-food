@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="my-4">Recipes</h1>

        <div class="row">
            @foreach ($recipes as $recipe)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $recipe->nombre }}</h5>
                            <p class="card-text">{{ $recipe->description }}</p>
                            <p class="card-text">Difficulty: {{ $recipe->difficulty }}</p>
                            <p class="card-text">Preparation time: {{ $recipe->preparation_time }} minutos</p>
                            <img class="card-img-top" src="{{ asset($recipe->image_path) }}" alt="{{ $recipe->name }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
