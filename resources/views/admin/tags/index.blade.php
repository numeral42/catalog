@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
    @can('admin.tags.create')
        <a href="{{route('admin.tags.create')}}" class="float-right">
            <p class="btn-green px-2 py-1 mt-1">Agregar etiqueta</p>
        </a>
    @endcan

    <h1>Lista de etiquetas</h1>
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
                        <th>Name</th>
                        <th>Color</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td class="text-{{$tag->color}}-500 font-bold">{{$tag->color}}</td>
                            <td width="10px">
                                @can('admin.tags.edit')
                                    <a href="{{route('admin.tags.edit', $tag)}}">
                                        <p class="btn-blue px-2 py-1 mt-1">Editar</p>
                                    </a>
                                @endcan
                                
                            </td>
                            <td width="10px">
                                @can('admin.tags.destroy')
                                    {!! Form::open(['route'=> ['admin.tags.destroy', $tag], 'method'=>'delete']) !!}
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

<script src="{{ mix('js/app.js') }}" defer></script>
    <script> console.log('Hi!'); </script>
@stop