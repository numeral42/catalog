@extends('adminlte::page')

@section('title', 'Providers')

@section('content_header')

    <a href="{{ route('admin.orders.create', ['provider' => $provider->id]) }}">
        <p class="btn-green float-right">Nuevo pedido</p>
    </a>
    <h1>Productos de {{ $provider->name }}</h1>
@stop

@section('content')
    {{-- <table class="m-auto w-full divide-y divide-black"> --}}
    <table id="example" class="display compact" style="width:100%">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Stock</th>
            <th>Precio $</th>
        </thead>
        {{-- <tbody class=" divide-y divide-black"> --}}
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        @if ($product->status == 1)
                            <p class="text-blue-500">En depósito</p>
                        @elseif($product->status == 2)
                            <p class="text-green-500">A la venta</p>
                        @elseif($product->status == 3)
                            <p class="text-red-500">En falta</p>
                        @elseif($product->status == 4)
                            <p class="text-black">Discontinuado</p>
                        @endif

                    </td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

@section('css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
@stop

@section('js')
 @livewireScripts
@stop
