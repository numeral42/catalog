@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>
                {{session('info')}}
            </strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route'=>['admin.roles.update', $role], 'method'=>'put']) !!}

                @include('admin.roles.partials.form')

                {!! Form::submit('Actualizar rol', ['class'=>'btn-blue bg-blue-500 px-2 py-1 mt-1']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
   
      
       <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
   
       @stack('css') 
       <script src="https://cdn.tailwindcss.com"></script> 
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop