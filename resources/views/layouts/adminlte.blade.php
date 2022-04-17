@extends('adminlte::page')

@section('title', 'Numeral42')

@section('content_header')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Loged{{-- {{ config('app.name', 'Laravel') }} --}}</title>

<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Styles -->
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="https://cdn.tailwindcss.com"></script>
@livewireStyles

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>
@stop

@section('content')
    
{{$slot}}

@stop

@section('css')

@stop

@section('js')

@stop