@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
    <h1>Editar etiquetas</h1>
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
            {!! Form::model($tag, ['route'=> ['admin.tags.update', $tag], 'method'=>'put']) !!}
    
            @include('admin.tags.partials.form')

                {!! Form::submit('Actualizar etiqueta', ['class'=>'btn-blue bg-blue-500 px-2 py-1 mt-1']) !!}
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