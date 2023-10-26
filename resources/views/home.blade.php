@extends('layouts.master')

@section('header_title_page', 'Home')

@section('content')
    <!-- Contenido principal -->
    <div class="container custom-content">
        <h1 class="mb-4">Soup Kitchen</h1>

        <!-- Botón para pedir un plato -->
        <button class="btn btn-dark" onclick="orderDish()">Order a dish</button>

        <!-- Sección de Historial de Pedidos -->
        <section class="mt-4">
            <h2>Orders in progress</h2>
            <ul class="list-group historial_orders" id="ordersHistory">
                @if ($ordersHistory && count($ordersHistory) > 0)
                    @foreach ($ordersHistory as $order)
                        <li class="list-group-item">{{ $order }}</li>
                    @endforeach
                @else
                    <p>There's no orders in progress</p>
                @endif
            </ul>
        </section>
    </div>
@endsection

@section('extra-js')
    <script>
        function orderDish() {
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

        function updateOrdersHistory() {
            // Hacemos una solicitud al servidor para obtener el nuevo historial de orders
            axios.get('{{ route('historial-orders.index') }}')
                .then(response => {
                    const ordersHistoryElement = $('#ordersHistory');

                    $.each(response.data.ordersHistory, function(index, item) {
                        ordersHistoryElement.append('<li class="list-group-item">' + item.nombre + '</li>');
                    });
                })
                .catch(error => {
                    console.error('Error recieving orders history', error);
                });
        }

        // Actualizamos automáticamente cada 30 segundos
        setInterval(updateOrdersHistory, 30000);

        // Ejecutamos la actualización al cargar la página
        updateOrdersHistory();
    </script>
@endsection

