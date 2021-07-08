{!! Form::open(['route'=>['security.perfiles.destroy',$perfil],'method'=>'DELETE']) !!}
<button type='submit' onclick='return confirm("¿Seguro que desea eliminar el perfil?")' class='btn btn-danger'>
    Eliminar Perfil
</button>
{!! Form::close() !!}