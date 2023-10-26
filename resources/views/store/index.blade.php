@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="my-4">Ingredients in Store</h1>

        <div class="row">
            @foreach ($ingredientsStore as $ingredientStore)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ingredientStore->ingredient->name }}</h5>
                            <p class="card-text">Quantity in store: {{ $ingredientStore->quantity_available }}</p>
                            <img class="card-img-top"
                                src="{{ asset($ingredientStore->ingredient->image_path) }}"
                                alt="{{ $ingredientStore->ingredient->name }}"
                            >
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
