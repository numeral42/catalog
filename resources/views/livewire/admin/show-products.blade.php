<div wire:init="loadProducts">
    <script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="w-full">
        
        <x-table>

            <div class="flex items-center mx-4">

                <div class="flex-initial items-center my-2">
                    <span>Mostrar</span>

                    {!! Form::select('cant', $cantArray, 'cant', ['class' => 'pl-1 flex form-control', 'wire:model' => 'cant']) !!}

                    <span>entradas</span>
                </div>

                <x-jet-input class="flex-1 mx-3" placeholder="Escriba que quiere buscar" type="text"
                    wire:model="search" />
                @livewire('admin.create-product')
            </div>

            @if (count($products))
                <table class="min-w-full divide-y divide-gray-200 grid-cols-6">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" 
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                 wire:click="order('id')">
                                ID
                                {{-- Sort --}}
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif 
                            </th>
                            <th  scope="col" 
                               class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('name')">
                                Nombre
                                {{-- Sort --}}
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif 
                            </th>
                            <th  scope="col" 
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('provider_id')">
                                Proveedor
                                {{-- Sort --}}
                         @if ($sort == 'provider')
                                    @if ($direction == 'asc')
                                        <i class=" fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif 
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('description')">
                                Descripción
                                {{-- Sort --}}
                              @if ($sort == 'description')
                                    @if ($direction == 'asc')
                                        <i class=" fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif 
                            </th>
                            <th scope="col" 
                               class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                               wire:click="order('status')">
                                Estado
                                {{-- Sort --}}
                                @if ($sort == 'status')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif 
                            </th>
                            <th scope="col" 
                            class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($products as $item)
                            <tr>

                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->name }}
                                    </div>
                                </td>
                                <td class="text-sm text-gray-900">
                                    <div class="text-sm text-gray-900">
                                        @if(isset($item->provider->name))
                                            {{ $item->provider->name }}
                                        @endif
                                        
                                    </div>
                                </td>
                                <td class="text-sm text-gray-900">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->description }}
                                    </div>
                                </td>
                                <td class="text-sm text-gray-900">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->status }}
                                    </div>
                                </td>
                               <td class="px-6 py-4 ext-sm font-medium flex">

                                    <a class="btn btn-blue px-1.5 py-0.5 sm:px-3 sm:py-2 ml-2"
                                        wire:click="$emit('show',{{ $item }})">
                                        <i class="fas fa-eye"></i>

                                    </a>

                                    <a class="btn btn-green px-1.5 py-0.5 sm:px-3 sm:py-2 ml-2"
                                        wire:click="$emit('edit',{{ $item }})">
                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <a class="btn btn-red px-1.5 py-0.5 sm:px-3.5 sm:py-2 ml-2"
                                        wire:click="$emit('deleteProduct', {{ $item->id }})">
                                        <i class="fas fa-trash"></i>

                                    </a>

                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>

                @if ($products->hasPages())
                    <div class="px-6 py-3">
                        {{ $products->links() }}
                    </div>
                @endif
            @else
                <div class="px-6 py-4">
                    No existe ningún registro coincidente
                </div>
            @endif

        </x-table>

    </div>
    {{-- Modal actualizar --}}

    <x-jet-dialog-modal wire:model="open_edit" wire:submit.prevent="save">

        <x-slot name="title">
            Editar el producto
        </x-slot>

        <x-slot name="content">

            <div wire:loading wire:target="image"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Imagen cargado!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado</span>

            </div>
            <div class="mb-4">
                <x-jet-label value="Nombre del producto" />
                <x-jet-input type="text" class="w-full" wire:model="name" value={{ $name }} />

                <x-jet-input-error for="name" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Slug" />
                <x-jet-input wire:model="slug" readonly type="text" class="w-full" value={{ $slug }} />
                <x-jet-input-error for="slug" />
            </div>

            @if ($imageUpLoad)
                <img src="{{ $imageUpLoad->temporaryUrl() }}">
            @else
                @if ($product->image)
                    <img src="{{ Storage::url($product->image->url) }}" alt="">
                @else
                    <img src="{{ Storage::url('numeral42.png') }}" alt="">
                @endif
            @endif

            <input type="file" wire:model="imageUpLoad">

            <div>
                <x-jet-label value="Usuario del producto" />
                <x-jet-input wire:model="user" readonly rows="6" class="form-control w-full"></x-jet-input>
                <x-jet-input-error for="user" />
            </div>
            <div>
                <x-jet-label value="Categoría del producto" />
                <x-jet-input wire:model="category" readonly rows="6" class="form-control w-full"></x-jet-input>
                <x-jet-input-error for="category" />
            </div>
            <div>
                <x-jet-label value="Descripción del producto" />
                <textarea wire:model="description" rows="6" class="form-control w-full"></textarea>
                <x-jet-input-error for="description" />
            </div>


            <div class="mb-4">
                <x-jet-label value="Precio del producto" />
                <x-jet-input type="text" class="w-full" wire:model="price" value={{ $price }} />

                <x-jet-input-error for="price" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Stock del producto" />
                <x-jet-input type="text" class="w-full" wire:model="stock" value={{ $stock }} />

                <x-jet-input-error for="stock" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>


    {{-- Formulario mostrar --}}
    <x-jet-dialog-modal wire:model="open_show" class="z-20">

        <x-slot name="title">
            Mostrar el producto
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Producto nº:" />{{ $product->id }}

            </div>
            <div class="mb-4">
                <x-jet-label value="Nombre del producto" />
                <x-jet-input readonly type="text" class="w-full" wire:model="name" />


            </div>
            <div>
                @if ($product->image)
                    <img class="flex mx-auto" src="{{ Storage::url($product->image->url) }}" alt="">
                @else
                    <img src="{{ Storage::url('numeral42.png') }}" alt="">
                @endif
            </div>

            <div class="mb-4">
                <x-jet-label value="Categoria del producto" />
                <x-jet-input readonly type="text" class="w-full" wire:model="category" />

            </div>

            <div>
                <x-jet-label value="Descripción del producto" />
                <textarea readonly wire:model="description" rows="6" class="form-control w-full"></textarea>

            </div>

            <div class="mb-4">
                <x-jet-label value="Cantidad de unidades del producto" />
                <x-jet-input readonly type="text" class="w-full" wire:model="stock" />

            </div>
            <div class="mb-4">
                <x-jet-label value="Precio publicado del producto" />
                <x-jet-input readonly type="text" class="w-full" wire:model="price" />

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_show',false)">
                Cerrar
            </x-jet-secondary-button>
        </x-slot>

    </x-jet-dialog-modal>

</div>
