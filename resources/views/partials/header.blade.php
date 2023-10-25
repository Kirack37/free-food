<nav class="custom-navbar navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Comedor Social</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ingredientes.index') }}">Ingredientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('recetas.index') }}">Recetas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bodega.index') }}">Bodega</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Plaza de Mercado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Historial de Pedidos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    @section('styles')
        <style>
            nav {
                background-color: #333;
            }
        </style>
