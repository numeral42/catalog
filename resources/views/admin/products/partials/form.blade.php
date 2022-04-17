<div class="form-group">
    {!! Form::label('name', 'Nombre', [null]) !!}
    {!! Form::text('name', null, ['class'=>'form-control', 
        'placeholder'=>'Ingrese el nombre del producto']) !!}

    @error('name')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug', [null]) !!}
    {!! Form::text('slug', null, ['class'=>'form-control', 
        'placeholder'=>'Ingrese el slug del producto', 'readonly']) !!}

    @error('slug')
    <small class="text-danger">
        {{$message}}
    </small>
@enderror

</div>

<div class="form-group">
    {!! Form::label('provider_id', 'Proveedor:', [null]) !!}
    {!! Form::select('provider_id', $providers, null, ['class'=>'form-control']) !!}
    @error('provider_id')
    <small class="text-danger">
        {{$message}}
    </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoría:', [null]) !!}
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    @error('category_id')
    <small class="text-danger">
        {{$message}}
    </small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Etiquetas:</p>
    @foreach ($tags as $tag)
        <label class="mr-2 text-{{$tag->color}}-500">
            {!! Form::checkbox('tags[]', $tag->id, null, [null]) !!}
            {{$tag->name}}              
        </label>
    @endforeach
    @error('tags')
    <br>
    <small class="text-danger">
        {{$message}}
    </small>
@enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Estado:</p>
    <label>
        {!! Form::radio('status', 1, true, ['class'=>'mx-1']) !!}
        En deposito
    </label>
    <label>
        {!! Form::radio('status', 2, false, ['class'=>'mx-1']) !!}
        A la venta
    </label>
    <label>
        {!! Form::radio('status', 3, false, ['class'=>'mx-1']) !!}
        En falta
    </label>
    <label>
        {!! Form::radio('status', 3, false, ['class'=>'mx-1']) !!}
        Discontinuado
    </label>
    @error('status')
    <small class="text-danger">
        {{$message}}
    </small>
    @enderror
</div>


<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            <img id="picture" src="
                @isset($product->image)
                    {{Storage::url($product->image->url)}}
                @else
                    {{Storage::url('public/numeral42.png')}}
                @endif
            " alt="">
        </div>
        
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrará con el producto', [null]) !!}
            {!! Form::file('file', ['class'=>'form-control-file', 'accept'=>'image/*']) !!}
        </div>
        @error('file')
            <small class="text-danger">
                {{$message}}
            </small>
            <br> 
        @enderror
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
            Cum consequuntur dolor saepe nostrum debitis. 
            Voluptas atque reprehenderit sint vel autem ea eum tempora magni maiores voluptatibus. 
            Ex est minus eum?
        </p>
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripción:', [null]) !!}
    {!! Form::text('description', null, ['class'=>'form-control']) !!}
    @error('description')
    <small class="text-danger">
        {{$message}}
    </small>
@enderror
</div>
