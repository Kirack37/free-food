@extends('layouts.master')

@section('content')
    <div class="container custom-content">
        <h1 class="mt-3 mb-4">Order History</h1>
        <table id="orderHistoryTable" class="display">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Recipe Name</th>
                    <th>¿Finished?</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->recipe->name }}</td>
                        <td>{{ $order->finished ? 'Finished' : 'On Progress' }}</td>
                        <td>{{ $order->created_at }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('extra-js')
    <script>
        $(document).ready(function() {
            $('#orderHistoryTable').DataTable();
        });
    </script>
@endsection
