<div class="form-group">
    {!! Form::label('name', 'Nombre:', [null]) !!}
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre del rol']) !!}
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<h2 class="h3">
    Lista de premisos
</h2>
@foreach ($permissions as $permission)
    <label>
        {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
        {{$permission->description}}
    </label><br>

@endforeach