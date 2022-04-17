<x-app-layout>
    <div class="container py-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach ($products as $product)
                <x-home.card-product :product="$product">
                </x-home.card-product>
            @endforeach

        </div>

    <div class="mt-4">
            {{ $products->links('pagination::tailwind') }}
        </div>

    </div>

</x-app-layout>