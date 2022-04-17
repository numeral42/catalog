@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
   
    <div class="card">
        <div class="card-body">

            {!! Form::open(['route'=>['admin.roles.store']]) !!}
                           
                @include('admin.roles.partials.form')

                {!! Form::submit('Crear rol', ['class'=>'btn-green bg-green-500 px-2 py-1 mt-1']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<!-- Styles -->
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="https://cdn.tailwindcss.com"></script>

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop