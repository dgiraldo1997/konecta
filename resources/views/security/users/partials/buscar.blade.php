<!-- CELDA DE BUSQUEDA... -->
{!! Form::model(Request::all(),['route'=>'security.users.index','method'=>'GET','class'=>'navbar-form navbar-right','role'=>'search']) !!}
<tr>

    <td>{!! Form::text('documento',null,['class'=>'form-control','placeholder'=>'Buscar por Documento','autocomplete'=>'off']) !!}</td>
    <td>{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar por Nombre','autocomplete'=>'off']) !!}</td>
    <td>{!! Form::number('telefono',null,['class'=>'form-control','placeholder'=>'Buscar por Telefono','autocomplete'=>'off']) !!}</td>
    <td>{!! Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Buscar por Direccion','autocomplete'=>'off']) !!}</td>
    <td><button type="submit" class="btn btn-primary"> Buscar</button></td>
</tr>
{!! Form::close() !!}
<!-- FIN CELDA DE BUSQUEDA...-->