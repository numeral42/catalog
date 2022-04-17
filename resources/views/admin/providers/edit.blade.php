@extends('adminlte::page')

@section('title', 'Providers')

@section('content_header')
<h1>Editar proveedor</h1>
@stop

@section('content')
    
@if (session('info'))
<div class="alert alert-success">
    <strong>
        {{session('info')}}
    </strong>
</div>
@endif

{!! Form::model($provider, ['route'=>['admin.providers.update',$provider],'method'=>'put']) !!}
   
     {!! Form::hidden('user_id', auth()->user()->id, [null]) !!} 
    @include('admin.providers.partials.form')
    {!! Form::submit('Actualizar proveedor', ['class' => 'btn-blue']) !!}

    {!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
 
@stop

@section('js')

<script src="{{ mix('js/app.js') }}" defer></script>
@stop
