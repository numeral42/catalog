@props(['id' => null, 'maxWidth' => 'sm'])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }} >
    <div class="pb-4 rounded-lg mx-2 my-2 h-full px-7 border-2 border-gray-500">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end text-right py-3 px-3 ">
        {{ $footer }}
    </div>
</x-jet-modal>
