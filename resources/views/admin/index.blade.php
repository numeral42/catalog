@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<div class="">
    @livewire('admin.show-products')
</div>
    

@stop

@section('css')    <link rel="stylesheet" href="/css/admin_custom.css">
   @livewireStyles
 <link rel="stylesheet" href="{{ mix('css/app.css') }}">

   
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    @stack('css') 
    <script src="https://cdn.tailwindcss.com"></script> 

@stop 

@section('js')
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
    @stack('modals')

    <script>
        Livewire.on('alert',function(message){
            Swal.fire(
                'Buen trabajo!',
                message,
                'success'
            )
        })
    </script>

    @stack('js') --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('deleteProduct', productId => {
            Swal.fire({
                title: 'Estás seguro?',
                text: "No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, elimínelo!'
            }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emitTo('admin.show-products', 'delete', productId);

                    Swal.fire(
                        'Borrado!',
                        'Su archivo ha sido eliminado.',
                        'success'
                    )
                }
            })
        });
    </script>

    <script src="{{ asset('storage/jQuery-Plugin-stringToSlug-1.3.0/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-',

            });
        });
    </script>

@stop
