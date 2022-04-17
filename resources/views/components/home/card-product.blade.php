<div class="">
    <div class="shadow-lg rounded-lg py-2 px-2">
        @if (isset($product->provider->name))
            {{ $product->provider->name }}
        @endif

        <div class="relative py-2 px-2">

            @livewire('show-image',['product'=>$product])

            <div class="absolute top-0 left-0 ">
                <strong class="bg-gray-400 px-1 rounded-lg">Art: {{ $product->id }}</strong>
            </div>
            <div class="absolute bottom-0 right-0">

                <span class="">
                    <ul class="grid justify-items-end items-end">
                        @foreach ($product->tags as $tag)
                            <li class="content-end mr-2">
                                <a href="{{ route('products.tag', $tag) }}"
                                    class=" px-3 h-6 bg-{{ $tag->color }}-500 text-white rounded-full">
                                    {{ $tag->name }}

                                </a>

                            </li>
                        @endforeach
                    </ul>
                </span>
            </div>
        </div>
        <div class="">

            <p class="font-bold">
                {{ $product->name }}
            </p>
            <p class="font-serif italic">
                {{ $product->description }}
            </p>
        </div>

        <div class="">

            <div class=""> <strong>
                    Precio: $
                </strong>
                {{ $product->price }}
            </div>
            <div class=""> <strong>
                    Unidades:
                </strong>
                {{ $product->stock }}
            </div>
            <br>
            <div class="px-10">
                {!! Form::open(['' => '']) !!}
                {!! Form::submit('Agregar', [' class' => 'form-control  btn-green bg-lime-500']) !!}
                {!! Form::close() !!}
                {{ $product->status }}
            </div>
        </div>
    </div>

</div>
