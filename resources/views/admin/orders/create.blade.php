@extends('adminlte::page')

@section('title', 'Orders')

@section('content_header')
    <h1>Formulario de pedido a {{$provider->name}}</h1>
@stop

@section('content')

<table class="w-full divide-y divide-gray-500 text-center border border-gray-500">
    <thead>
        <tr>
            <th>Id</th>
            <th>Producto</th>
            <th>Stock</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody class=" divide-y divide-gray-500">
        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->stock}}</td>
                <td>{!! Form::text('quantity', null, ['class']) !!}</td>
            </tr>
        @endforeach

    </tbody>
</table>
<p class="btn-green float-right my-3 mx-3">Guardar pedido</p>

@stop

@section('css')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop