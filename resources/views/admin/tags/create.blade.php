@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
    <h1>Crear nueva etiqueta</h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.tags.store']) !!}
                
                @include('admin.tags.partials.form')

                {!! Form::submit('Crear etiqueta', ['class'=>'btn-green bg-green-500 px-2 py-1 mt-1']) !!}
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