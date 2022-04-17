@extends('adminlte::page')

@section('title', 'Providers')

@section('content_header')
    <h1>Lista de proveedores</h1>
    <a href="{{ route('admin.providers.create') }}" class="float-right">
        <p class="btn-green">Nuevo proveedor</p>
    </a>
@stop

@section('content')

    <table class="m-auto w-full divide-y divide-black">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th></th>
                <th>CUIL/CUIT</th>
                <th>Telefono</th>
                <th>Email</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-black">
            @foreach ($providers as $provider)
                <tr>
                    <td>{{ $provider->id }}</td>
                    <td><a href="{{ route('admin.providers.show', $provider) }}"
                            class=" font-semibold underline text-red-500">{{ $provider->name }}</a></td>
                    <td><a href="{{route('admin.orders.create',['provider'=>$provider->id])}}"><p class="btn-green float-right">Pedir</p></a> </td>
                    <td>{{ $provider->cuilcuit }}</td>
                    <td>{{ $provider->phone }}</td>
                    <td>{{ $provider->email }}</td>
                    <td><a href="{{$provider->web}}"  class="text-blue-500 hover:text-red-500 underline" target="_blank">{{$provider->web}}</a></td>
                    <td><a href="{{ route('admin.providers.edit', $provider) }}">
                            <p class="btn-blue">Editar</p>
                        </a></td>
                    <td>
                        {!! Form::open(['route' => ['admin.providers.destroy', $provider], 'method' => 'delete']) !!}
                        {!! Form::submit('Eliminar', ['class' => 'btn-red bg-red-500']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>

    @stop

    @section('css')
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
    @stop

    @section('js')
        @livewireScripts
    @stop
