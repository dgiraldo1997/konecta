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
                        <span class='pull-center'><span class="icon-user-tie"></span> Ver Cliente: <strong>{{$clientes->name}}</strong></span>
                    </div>
                </div>


                <div class="panel-body">
                    <!--VALIDACION DE ERRORES...-->
                    @include('errores')
                    <div class='form-horizontal'>
                        <div class='form-group'>
                            {!! Form::label('lNombre','Documento:',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-4">
                                {!! Form::label($clientes->documento,null,['class'=>'form-control']) !!}
                            </div>
                            {!! Form::label('lCodigo','Nombre:',['class'=>'col-sm-2 control-label ']) !!}
                            <div class="col-sm-4">
                                {!! Form::label($clientes->name,null,['class'=>'form-control uppercase']) !!}
                            </div>
                        </div><div class='form-group'>
                            {!! Form::label('lNombre','Telefono:',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-4">
                                {!! Form::label($clientes->telefono,null,['class'=>'form-control']) !!}
                            </div>
                            {!! Form::label('lCodigo','Direccion:',['class'=>'col-sm-2 control-label ']) !!}
                            <div class="col-sm-4">
                                {!! Form::label($clientes->direccion,null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class='form-group'>
                            {!! Form::label('lNombre','Estado',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-4 h4">
                                @if($clientes->activo==1)
                                <span class="icon-checkbox-checked label label-success"> </span>
                                @else
                                <span class="icon-checkbox-unchecked label label-danger"> </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class='panel-footer'>
                    <table align='center'>
                        <tr>
                            <td>
                                @if($permisos->editar)
                                    <a title='Editar' class='btn btn-success' href="{{ route('administracion.clientes.edit',$clientes) }}">Editar</a>
                                @endif
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
