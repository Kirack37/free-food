@extends('layouts.master')

@section('header_title_page', 'Home')

@section('content')
    <!-- Contenido principal -->
    <div class="container custom-content">
        <h1 class="mb-4">Comedor Social</h1>

        <!-- Botón para pedir un plato -->
        <button class="btn btn-dark" onclick="pedirPlato()">Pedir Plato</button>

        <!-- Sección de Historial de Pedidos -->
        <section class="mt-4">
            <h2>Historial de Pedidos</h2>
            <ul class="list-group historial_pedidos" id="historialPedidos">
                @if ($historialPedidos && count($historialPedidos) > 0)
                    @foreach ($historialPedidos as $pedido)
                        <li class="list-group-item">{{ $pedido }}</li>
                    @endforeach
                @else
                    <p>No hay pedidos</p>
                @endif
            </ul>
        </section>
    </div>
@endsection

@section('extra-js')
    <script>
        function pedirPlato() {
            // Llamada Axios para pedir platos
            axios.post('/pedir-plato')
                .then(response => {
                    console.log(response.data);
                    // TODO: Llamada para pedir plato
                })
                .catch(error => {
                    console.error('Error al pedir el plato', error);
                });
        }

        function actualizarHistorialPedidos() {
            // Hacemos una solicitud al servidor para obtener el nuevo historial de pedidos
            axios.get('{{ route('historial-pedidos.index') }}')
                .then(response => {
                    const historialPedidosElement = $('#historialPedidos');

                    $.each(response.data.historialPedidos, function(index, item) {
                        historialPedidosElement.append('<li class="list-group-item">' + item.nombre + '</li>');
                    });
                })
                .catch(error => {
                    console.error('Error al obtener el historial de pedidos', error);
                });
        }

        // Actualizamos automáticamente cada 30 segundos
        setInterval(actualizarHistorialPedidos, 30000);

        // Ejecutamos la actualización al cargar la página
        actualizarHistorialPedidos();
    </script>
@endsection

@section('styles')
    <style>
        body {
            padding-top: 4.5rem;
            background-color: #f5f5f5;
        }

        .btn-dark {
            background-color: #343a40;
            color: #fff;
        }

        @media (max-width: 768px) {
            body {
                padding-top: 0;
                /* Elimina el espacio superior en dispositivos pequeños */
            }
        }
    </style>
@endsection
