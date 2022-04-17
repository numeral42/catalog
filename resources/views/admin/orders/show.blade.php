@extends('adminlte::page')

@section('title', 'Orders')

@section('content_header')
    <h1>Detalles del pedido</h1>
@stop

@section('content')

<table class="w-full divide-y divide-gray-500">
    <thead>
        <tr>
            <th>id</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total $</th>
        </tr>
    </thead>
    <tbody class=" divide-y divide-gray-500">
        @foreach ($orderProducts as $orderProduct)
            <tr>
                <td>{{ $orderProduct->id }}</td>
                <td>{{ $orderProduct->product($orderProduct->product_id)->name }}</td>
                <td>{{ $orderProduct->quantity }}</td>
                <td>{{ $orderProduct->product($orderProduct->product_id)->price }}</td>
                <td>{{ $orderProduct->product($orderProduct->product_id)->price * $orderProduct->quantity }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop

@section('css')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop