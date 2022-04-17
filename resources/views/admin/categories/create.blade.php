@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Crear nueva categoría</h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=> 'admin.categories.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 
                        'placeholder'=>'Ingrese el nombre de la categoría']) !!}
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class'=>'form-control', 
                        'placeholder'=>'Ingrese el slug de la categoría','readonly']) !!}
                    @error('slug')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {!! Form::submit('Crear categoría', ['class'=>'btn-green bg-green-500 px-2 py-1 mt-1']) !!}
            {!! Form::close() !!}
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

    <script src="{{asset('storage/jQuery-Plugin-stringToSlug-1.3.0/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-',
            });
        });
    </script>
@stop
