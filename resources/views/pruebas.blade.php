{{-- @extends('adminlte::page')

@section('title', 'Numeral42')

@section('content_header')
    @foreach ($categories as $category)
        <a href="{{ route('products.category', $category) }}"
            class="hover:opacity-50 bg-gradient-to-b from-teal-100 via-teal-500 to-teal-900 text-black hover:text-white px-3 py-2 rounded-lg text-sm font-medium">{{ $category->name }}</a>
    @endforeach

@stop

@section('content')


    <div class="container py-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

            @foreach ($products as $product)
                <x-card-product :product="$product">
                </x-card-product>
            @endforeach

        </div>

        <div class="mt-4">
            {{ $products->links('vendor.pagination.tailwind') }}
        </div>

    </div>

@stop
@section('footer')
    <div class="float-right">
        <p>Design:
            <a href="{{ route('pruebas') }}">Numeral42</a>
        </p>
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
    <script>
        console.log('Hi!');
    </script>
    @livewireScripts
@stop
 --}}

@livewire('show-image')

