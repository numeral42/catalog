<div wire:init="loadProducts">

    <img class="cursor-pointer rounded-lg bg-cover object-cover w-full h-52" src="
    @if ($product->image) {{ Storage::url($product->image->url) }}
@else
{{ Storage::url('public/numeral42.png') }} @endif
" alt=""  wire:click="$set('open',true)">

    <x-home.dialog-modal wire:model="open" class="">

        <x-slot name="title"><br>
            
        </x-slot>

        <x-slot name="content">

            <img class="rounded-lg bg-cover object-cover  }" src="
            @if ($product->image) {{ Storage::url($product->image->url) }}
      @else
      {{ Storage::url('public/numeral42.png') }} @endif
  " alt=""> 
        </x-slot>

        <x-slot name="footer">

           <x-home.secondary-button wire:click="$set('open',false)">
                <p>Cerrar</p>
            </x-home.secondary-button>

        </x-slot>

    </x-home.dialog-modal>
</div>
