@extends('app')
@section('security')
active
@endsection

@section('content')
<div id='content' class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-wrench"></span> Permisos del Perfil <b>{{ $perfil->nombre }}</b></div>

                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#">Permisos por menús</a></li>
                    </ul>
                    <br>
                    {!! Form::model($perfil,['route'=>['security.permisos.update',$perfil],'method'=>'PUT','autocomplete'=>'off']) !!}
                    <table class='table table-striped'>
                        <input type='hidden' value='{{ $perfil->id }}' name='perfil'>
                        <tr>
                            <th>Menú</th>
                            <th>Opción</th>
                            <th class='text-center'>Acceder</th>
                            <th class='text-center'>Crear</th>
                            <th class='text-center'>Editar</th>
                            <th class='text-center'>Eliminar/Anular</th>
                        </tr>

                        @foreach($permisos as $permiso)
                        <tr data-id='{{ $permiso->id }}'>
                            <td><span class="{{ $permiso->menuglyph }}"></span> {{ $permiso->menu }}</td>
                            <td><span class="{{ $permiso->glyph }}"></span> {{ $permiso->menu_detalle }}</td>
                        <input type='hidden' value='{{ $permiso->codigo }}' name='{{ $permiso->codigo }}menu'>
                        <td>@if($permiso->menuacceso){!! Form::checkbox($permiso->codigo.'acceso',1,$permiso->permisoacceso,['class'=>'form-control']) !!}@endif</td>
                        <td>@if($permiso->menucrear){!! Form::checkbox($permiso->codigo.'crear',1,$permiso->permisocrear,['class'=>'form-control']) !!}@endif</td>
                        <td>@if($permiso->menueditar){!! Form::checkbox($permiso->codigo.'editar',1,$permiso->permisoeditar,['class'=>'form-control']) !!}@endif</td>
                        <td>@if($permiso->menuborrar){!! Form::checkbox($permiso->codigo.'borrar',1,$permiso->permisoborrar,['class'=>'form-control']) !!}@endif</td>
                        </tr>
                        @endforeach
                    </table>
                    {!! Form::button('Guardar',['type'=>'submit','value'=>'Guardar','class'=>'btn btn-success']) !!}</td>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection