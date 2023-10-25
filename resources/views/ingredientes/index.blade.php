@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="my-4">Ingredientes</h1>

        <div class="row">
            @foreach ($ingredientes as $ingrediente)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ingrediente->nombre }}</h5>
                            <img class="card-img-top" src="{{ asset($ingrediente->image_path) }}" alt="{{ $ingrediente->nombre }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
