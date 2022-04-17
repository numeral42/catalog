@extends('adminlte::page')

@section('title', 'Orders')

@section('content_header')
    <h1>Lista de pedidos</h1>
    
@stop

@section('content')

  <table class="w-full divide-y divide-gray-500">
      <thead>
          <tr>
              <th>Id</th>
              <th>Proveedor</th>
              <th>Fecha</th>
              <th>Estado</th>
              <th colspan="2"></th>
              
          </tr>
      </thead>
      <tbody class=" divide-y divide-gray-500">
          @foreach ($orders as $order)
            <tr>
                <td><a href="{{route('admin.orders.show',$order)}}" class="text-blue-500 hover:text-red-500 underline">{{$order->id}}</a></td>
                <td>{{$order->provider->name}}</td>
                <td>{{$order->date}}</td>
                <td>{{$order->status}}</td>
                <td><p class="btn-blue">Editar</p></td>
                <td><p class="btn-red">Eliminar</p></td>
            </tr>
          @endforeach
      </tbody>
  </table>
@stop

@section('css')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

@section('js')
    <script> console.log('Hi!'); </script>
@stop