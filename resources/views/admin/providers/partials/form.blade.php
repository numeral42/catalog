<div class="form-group">
    {!! Form::label('name', 'Nombre:', [null]) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del proveedor']) !!}
    @error('name')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('cuilcuit', 'CUIL/CUIT:', [null]) !!}
    {!! Form::text('cuilcuit', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el CUIL/CUIT del proveedor']) !!}
    @error('cuilcuit')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('address', 'Dirección:', [null]) !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la dirección del proveedor']) !!}
    @error('address')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('phone', 'Teléfono:', [null]) !!}
    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el teléfono del proveedor']) !!}
    @error('phone')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('email', 'Email:', [null]) !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el email del proveedor']) !!}
    @error('email')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('web', 'Web:', [null]) !!}
    {!! Form::text('web', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la web del proveedor']) !!}
    @error('web')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
