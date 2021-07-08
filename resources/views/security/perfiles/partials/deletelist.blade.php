{!! Form::open(['route'=>['security.perfiles.destroy',$perfil->id],'method'=>'DELETE']) !!}
<button type='submit' onclick='return confirm("¿Seguro que desea eliminar el perfil?")' class='btn btn-danger btn-xs'>
    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
</button>
{!! Form::close() !!}