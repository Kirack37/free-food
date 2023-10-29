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
                        <th>Order finished at</th>
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
                    {
                        data: 'updated_at',
                        title: 'Order finished at'
                    },
                ],
                order: [[1, 'desc']],
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
            Toastify({
                text: "Dish on preparation",
                duration: 3000,
                gravity: "bottom",
                position: "right",
                className: "info"
            }).showToast();
            axios.post('/order-dish')
                .then(response => {
                    Toastify({
                        text: "Order completed successfully",
                        duration: 5000,
                        gravity: "bottom",
                        position: "right",
                        className: "succeed"
                    }).showToast();
                })
                .catch(error => {
                    Toastify({
                        text: "Error when ordering the dish",
                        duration: 3000,
                        gravity: "bottom",
                        position: "right",
                        className: "error"
                    }).showToast();
                });
        }
    </script>
@endsection
@section('styles')
    <style>
        .toastify.info {
            background: #4b5ea3;
        }
        .toastify.succeed {
            background: #69ae37;
        }
        .toastify.error {
            background: #cc3014;
        }
    </style>
@endsection
