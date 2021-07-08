{!! Form::open(['route'=>['security.users.destroy',$user],'method'=>'DELETE']) !!}
<button type='submit' onclick='return confirm("¿Seguro que desea eliminar el usuario?")' class='btn btn-danger'>
    Eliminar Usuario
</button>
{!! Form::close() !!}