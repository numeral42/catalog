@extends('adminlte::page')

@section('title', 'Providers')

@section('content_header')
    <h1>Nuevo proveedor</h1>
@stop

@section('content')
{!! Form::open(['route' => ['admin.providers.store'], 'autocomplete' => 'off']) !!}

    @include('admin.providers.partials.form')
    {!! Form::submit('Agregar proveedor', ['class'=>'btn-green']) !!}

    {!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
