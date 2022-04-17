@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    @can('admin.roles.create')
        <a href="{{route('admin.roles.create')}}" class="float-right">
            <p class="btn-green px-2 py-1 mt-1">Agregar rol</p>
        </a>
    @endcan

    <h1>Lista de roles</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-danger">
            <strong>
                {{session('info')}}
            </strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Rol</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                @can('admin.roles.edit')
                                    <a href="{{route('admin.roles.edit', $role)}}">
                                        <p class="btn-blue px-2 py-1 mt-1">
                                            Editar 
                                        </p>
                                       
                                    </a>
                                @endcan

                            </td>
                            <td width="10px">
                                @can('admin.roles.destroy')
                                    {!! Form::open(['route'=>['admin.roles.destroy', $role], 'method'=>'delete']) !!}
                                        {!! Form::submit('Eliminar', ['class'=>'btn-red bg-red-500 px-2 py-1 mt-1']) !!}
                                    {!! Form::close() !!}                                    
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

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