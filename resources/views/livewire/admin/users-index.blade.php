<div>
    <div class="card">
        <div class="card-header">
            {!! Form::text('name', null, 
                ['wire:model'=>'search', 'class'=>'form-control', 'placeholder'=>'Ingrese el nombre o email de un usuario',
                'autocomplete'=>'off']) !!}
        </div>
    @if ($users->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td width="10px">
                                <a href="{{route('admin.users.edit', $user)}}">
                                    <p class="btn-blue px-2 py-1 mt-1">Editar</p>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$users->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay registros</strong>
        </div>
    @endif
    </div>
</div>
