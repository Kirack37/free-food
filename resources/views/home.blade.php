@extends('layouts.master')

@section('header_title_page', 'Home')

@section('content')
    <!-- Principal content -->
    <div class="container custom-content">
        <h1 class="mb-4">Soup Kitchen</h1>

        <!-- Button to ask for a dish -->
        <button class="btn btn-dark" onclick="orderDish()">Order a dish</button>

        <!-- Ordes history section -->
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
        <!-- Ingredients section -->
        <section class="mt-4">
            <div class="row" id="ingredientsContainer"></div>
        </section>
    </div>
@endsection

@section('extra-js')
    <script>
        $(document).ready(function() {
            // We initialize the table
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
                order: [
                    [1, 'desc']
                ],
                language: {
                    emptyTable: "No orders in progress at the moment",
                    infoEmpty: "No orders available",
                },
            });

            /**
             * Method to get the orders history and draw them in a table
             **/
            function updateOrdersHistory() {
                // We make an axios call in order to get the orders history
                axios.get('/get-orders-history')
                    .then(response => {
                        const ordersHistory = response.data.ordersHistory;

                        // We clear and add the new rows
                        ordersTable.clear().rows.add(ordersHistory).draw();
                    })
                    .catch(error => {
                        console.error('Error recieving orders history', error);
                    });
            }

            /**
             * Method to get the ingredients and quantity in the store
             **/
            function updateIngredients() {
                axios.get('/get-ingredients')
                    .then(response => {
                        // We empty and add the ingredients with the new quantities
                        $('#ingredientsContainer').empty();
                        $.each(response.data, function(index, data) {
                            $('#ingredientsContainer').append(`
                    <div class="col-md-3 mb-3">
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

            // We update each 5 seconds
            setInterval(updateIngredients, 5000);
            updateIngredients();

            // We update each 3 seconds
            setInterval(updateOrdersHistory, 3000);
            updateOrdersHistory();
        });

        /**
         * Method to order a new dish
         **/
        function orderDish() {
            // We show the information toast to let the user know that we have a new order
            Toastify({
                text: "Dish on preparation",
                duration: 3000,
                gravity: "bottom",
                position: "right",
                className: "info"
            }).showToast();

            // Axios post to execute the order dish logic
            axios.post('/order-dish')
                .then(response => {
                    // We show the succeed toast to let the user know that the order is finished
                    Toastify({
                        text: "Order completed successfully",
                        duration: 5000,
                        gravity: "bottom",
                        position: "right",
                        className: "succeed"
                    }).showToast();
                })
                .catch(error => {
                    // We show the succeed toast to let the user know that the order had an error
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
