<div>
    <x-jet-danger-button wire:click="$set('open',true)">
        Registrar producto
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title"><br>
            Registrar producto
        </x-slot>

        <x-slot name="content">

            <div wire:loading wire:target="image"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Imagen cargado!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado</span>

            </div>

            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="">
            @endif

            <div class="mb-4">
                <x-jet-label value="Nombre del producto" />
                <x-jet-input type="text" class="w-full" wire:model="name" />

                <x-jet-input-error for="name" />

            </div>
            <div class="mb-4">
                <x-jet-label value="Slug" />
                <x-jet-input type="text" class="w-full" readonly wire:model="slug" value={{$slug}} />

                <x-jet-input-error for="slug" />

            </div>

            <div class="mb-4" wire:ignore>
                <x-jet-label value="Descripción del producto" />
                <textarea id="editor" wire:model="description" class="form-control w-full" rows="6">
                </textarea>

                <x-jet-input-error for="description" />

            </div>

            <div>
                <input type="file" wire:model="image" id="{{ $identificador }}">
                <x-jet-input-error for="image" />
            </div>

        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target='save,image'
                class="disabled:opacity-25">
                Registrar producto
            </x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>

</div>
