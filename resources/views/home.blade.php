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
            <table id="ordersTable" class="display">
                <thead>
                    <tr>
                        <th>Order name</th>
                        <th>Order hour of creation</th>
                        <th>Order quantity</th>
                    </tr>
                </thead>
                <tbody id="ordersHistory"></tbody>
            </table>
        </section>
        <!-- Sección de ingredientes -->
        <section class="mt-4">
            <div class="row" id="ingredientsContainer"></div>
        </section>
    </div>
@endsection

@section('extra-js')
    <script>
        $(document).ready(function() {
            // Inicializamos la tabla con DataTables
            const ordersTable = $('#ordersTable').DataTable({
                columns: [{
                        data: 'name',
                        title: 'Order name'
                    },
                    {
                        data: 'created_at',
                        title: 'Order hour of creation'
                    },
                    {
                        data: 'quantity',
                        title: 'Order quantity'
                    },
                ],
                language: {
                    emptyTable: "No orders in progress at the moment",
                    infoEmpty: "No orders available",
                },
            });

            function updateOrdersHistory() {
                // Hacemos una solicitud al servidor para obtener el nuevo historial de órdenes
                axios.get('/get-orders-history')
                    .then(response => {
                        const ordersHistory = response.data.ordersHistory;

                        // Destruimos la tabla actual antes de recrearla
                        // ordersTable.destroy();

                        // Limpiamos y recreamos la tabla con los nuevos datos
                        ordersTable.clear().rows.add(ordersHistory).draw();
                    })
                    .catch(error => {
                        console.error('Error recieving orders history', error);
                    });
            }

            function updateIngredients() {
                axios.get('/get-ingredients')
                    .then(response => {
                        // Limpiamos el contenedor antes de agregar los nuevos ingredientes
                        $('#ingredientsContainer').empty();
                        console.log(response)
                        $.each(response.data, function(index, data) {
                            $('#ingredientsContainer').append(`
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">${data.ingredient.name}</h5>
                                <p class="card-description">Quantity available: <strong>${data.quantity_available}</strong></p>
                                <img class="card-img-top" src="{{ asset('${data.ingredient.image_path}') }}" alt="${data.ingredient.name}">
                            </div>
                        </div>
                    </div>
                `);
                        });
                    });
            }

            // Actualizamos automáticamente cada 30 segundos
            setInterval(updateIngredients, 30000);

            // Ejecutamos la actualización al cargar la página
            updateIngredients();

            // Actualizamos automáticamente cada 5 segundos
            setInterval(updateOrdersHistory, 3000);

            // Ejecutamos la actualización al cargar la página
            updateOrdersHistory();
        });

        function orderDish() {
            // Llamada Axios para pedir platos
            axios.post('/order-dish')
                .then(response => {
                    console.log(response.data);
                    // TODO: Llamada para pedir plato
                })
                .catch(error => {
                    console.error('Error when ordering the dish', error);
                });
        }
    </script>
@endsection
