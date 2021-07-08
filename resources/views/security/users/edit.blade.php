@extends('app')
@section('security')
active
@endsection

@section('content')
<div id='content' class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Editar Usuario: <b>{{ $user->name }}</b></div>

                <div class="panel-body">
                    <!--VALIDACION DE ERRORES...-->
                    @include('errores')

                    {!! Form::model($user,['route'=>['security.users.update',$user],'method'=>'PUT','autocomplete'=>'off']) !!}
                    <div class='form-horizontal'>
                        <div class='form-group'>
                            {!! Form::label('lUsuario','Usuario:',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-4">
                                <strong>{!! Form::text('username',null,['class'=>'form-control','disabled']) !!}</strong>
                            </div>
                        </div>
                        <div class='form-group'>
                            {!! Form::label('lNombres','Nombres:',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-4">
                                {!! Form::text('name',null,['class'=>'form-control']) !!}
                            </div>
                            {!! Form::label('lDocumento','Documento:',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-4">
                                {!! Form::text('documento',null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class='form-group'>
                            {!! Form::label('lTelefono','Teléfono:',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-4">
                                {!! Form::text('telefono',null,['class'=>'form-control']) !!}
                            </div>
                            {!! Form::label('lEmail','Correo electrónico:',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-4">
                                {!! Form::email('email',null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class='form-group'>
                            {!! Form::label('lDireccion','Dirección:',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-4">
                                {!! Form::text('direccion',null,['class'=>'form-control']) !!}
                            </div>
                            {!! Form::label('lPerfil','Perfil:',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-4">
                                {!! Form::select('perfil',$arrayperfiles,null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class='form-group'>
                            {!! Form::label('lActivo','Activo:',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-4">
                                {!! Form::checkbox('activo',1,null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <table><tr><td>{!! Form::button('Guardar',['type'=>'submit','value'=>'Guardar','class'=>'btn btn-success']) !!}</td>
                        {!! Form::close() !!}

                        <td style='padding-left:4px;'>@include('security.users.partials.botonatras')</td></td></tr>
                        @if($permisos->borrar)
                        <div class="pull-right">@include('security.users.partials.delete')</div>
                        @endif
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
