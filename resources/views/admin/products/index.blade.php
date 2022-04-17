@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')

    @if (session('info'))
        <div class="alert alert-danger">
            <strong>
                {{session('info')}}
            </strong>
        </div>
    @endif

    <a href="{{route('admin.products.create')}}" class="float-right">
        <p class="btn-green">Nuevo producto</p>
       </a>
    <h1>Listado de productos</h1>
@stop

@section('content')
    
    @livewire('admin.product-index')

@stop

@section('css')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

@livewireStyles

<link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop