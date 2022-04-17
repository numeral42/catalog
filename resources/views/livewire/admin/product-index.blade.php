<div class="card">
    <div class="card-header">
        <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre del producto">
    </div>

    @if ($products->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>
                                
                                @if ($product->status==1)
                                <p class="font-weight-bold text-blue-500">En deposito</p>
                                @elseif($product->status==2)
                                <p class="font-weight-bold text-green-500">A la venta</p>
                                @elseif($product->status==3)
                                <p class="font-weight-bold text-red-500">En falta</p>
                                @else
                                <p class="font-weight-bold text-black">Discontinuado</p>
                                @endif
                                
                            </td>
                            <td width="10px">
                                <a href="{{route('admin.products.edit', $product)}}">
                                    <p class="btn-blue px-2 py-1 mt-1">Editar</p>
                                </a>
                            </td>
                            <td width="10px">
                                {!! Form::open(['route'=>['admin.products.destroy', $product], 'method'=>'delete']) !!}
                                    {!! Form::submit('Eliminar', ['class'=>'btn-red bg-red-500 px-2 py-1 mt-1']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$products->links()}}
        </div>
    @else
    <div class="card-body">
        <strong>No hay ningún registro.</strong>
    </div>

    @endif


</div>
