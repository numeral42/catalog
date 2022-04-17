@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    @can('admin.categories.create')
        <a href="{{ route('admin.categories.create') }}" class="float-right">
            <p class="btn-green"> Agregar categoría</p>
        </a>
    @endcan

    <h1>Lista de categorías</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-danger">
            <strong>
                {{ session('info') }}
            </strong>
        </div>
    @endif
    {{-- bootstrap --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width='10px'>
                                @can('admin.categories.edit')
                                    <a href="{{ route('admin.categories.edit', $category) }}">
                                        <p class="btn-blue px-2 py-1 mt-1">Editar</p>
                                    </a>
                                @endcan

                            </td>
                            <td width='10px'>
                                @can('admin.categories.destroy')
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">
                                            <p class="btn-red px-2 py-1 mt-1">Eliminar</p>
                                        </button>
                                    </form>
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
    <script>
        console.log('Hi!');
    </script>
@stop
