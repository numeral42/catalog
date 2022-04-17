@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')



    @if (!auth()->user())
        <div class="w-full text-right">

            <a href="{{ route('login') }}"
                class="bg-gray-500 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>

            <a href="{{ route('register') }}"
                class="bg-gray-500 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>

        </div>
    @endif

    @if (isset($title))
    <p class=" text-7xl text-center">{{$title}}</p>
@endif

@stop

@section('content')

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 ">

            @foreach ($products as $product)
                <x-home.card-product :product="$product">
                </x-home.card-product>
            @endforeach

            </div>
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    @stop
 
    @section('right-sidebar')
   acA
@stop
    @section('footer')
        <p class="text-right ">Design:<a class="mx-3 text-blue-500 hover:text-red-500 underline" href="https://www.numeral42.ar">Numeral42.ar</a></p>
    @stop

    @section('css')

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">        
    <script src="https://cdn.tailwindcss.com"></script>
    @stop

    @section('js')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stop
