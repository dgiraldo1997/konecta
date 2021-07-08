@if($permisos->borrar)
{!! Form::open(['route'=>['security.users.destroy',$user->id],'method'=>'DELETE']) !!}
<button title='Eliminar' type='submit' onclick='return confirm("¿Seguro que desea eliminar el usuario?")' class='btn btn-danger btn-xs'>
    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
</button>
{!! Form::close() !!}
@else
    <a title='Eliminar' data-target="#sinpermisos" data-toggle="modal" class='btn btn-danger btn-xs btndesactivar'><span class="glyphicon glyphicon-trash"></span></a>
@endif