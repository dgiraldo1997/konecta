@extends('app')
@section('administracion')
active
@endsection

@section('content')
<div id='content' class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class='text-center'>
                        <span class='pull-left'> <a href="{{ url('/administracion/clientes') }}" class="btn btn-success btn-xs"><span class="icon-arrow-left"></span> Atrás</a></span>
                        <span class='pull-center'><span class="icon-eye-minus"></span> Editar Cliente: <strong>{{$clientes->name}}</strong></span>
                    </div>
                </div>


                <div class="panel-body">
                    <!--VALIDACION DE ERRORES...-->
                    @include('errores')

                    {!! Form::model($clientes,['route'=>['administracion.clientes.update',$clientes],'method'=>'PUT','autocomplete'=>'off']) !!}
                    <div class='form-horizontal'>
                        <div class='form-group'>
                            {!! Form::label('lNombre','Documento:',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-4">
                                {!! Form::text('documento',null,['class'=>'form-control','maxlength'=>'20','required']) !!}
                            </div>
                            {!! Form::label('lCodigo','Nombre:',['class'=>'col-sm-2 control-label ']) !!}
                            <div class="col-sm-4">
                                {!! Form::text('name',null,['class'=>'form-control uppercase','maxlength'=>'255','required']) !!}
                            </div>
                        </div><div class='form-group'>
                            {!! Form::label('lNombre','Telefono:',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-4">
                                {!! Form::number('telefono',null,['class'=>'form-control','maxlength'=>'20','required']) !!}
                            </div>
                            {!! Form::label('lCodigo','Direccion:',['class'=>'col-sm-2 control-label ']) !!}
                            <div class="col-sm-4">
                                {!! Form::text('direccion',null,['class'=>'form-control uppercase','maxlength'=>'255','required']) !!}
                            </div>
                        </div>
                        <div class='form-group'>
                            {!! Form::label('lEstado','Activo:',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-4">
                                {!! Form::checkbox('activo',1,$clientes->activo,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class='panel-footer'>
                    <table align='center'>
                        <tr>
                            <td>
                                {!! Form::button('Guardar',['type'=>'submit','value'=>'Guardar','class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </td>
                            <td style='padding-left:4px;'>
                                @if($permisos->borrar)
                                <a title='Eliminar' data-target="#confirmdelete" data-id="{{$clientes->id}}" data-toggle="modal" class='btn btn-danger'>Eliminar</a>
                                @endif
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@include('administracion.clientes.partials.confirmdelete');
@endsection
