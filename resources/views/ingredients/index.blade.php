@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="my-4">Ingredients</h1>

        <div class="row">
            @foreach ($ingredients as $ingredient)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ingredient->name }}</h5>
                            <img class="card-img-top" src="{{ asset($ingredient->image_path) }}" alt="{{ $ingredient->name }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
