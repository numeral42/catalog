@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Editar usuario</h1>
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
            <p class="h5">
                Nombre:
            </p>
            <p class="form-control">
                {{$user->name}}
            </p>
            <h2 class="h5">Listado de roles</h2>
            {!! Form::model($user, ['route'=>['admin.users.update',$user],'method'=>'put']) !!}
                @foreach ($roles as $role)
                    <div class="">
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach
                {!! Form::submit('Actualizar', ['class'=>'btn-blue bg-blue-500 px-2 py-1 mt-1']) !!}
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