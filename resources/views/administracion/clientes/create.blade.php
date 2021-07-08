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
                        <span class='pull-center'><span class="icon-user-tie"></span> Nuevo Cliente</span>
                    </div>
                </div>

                <div class="panel-body">
                    <!--VALIDACION DE ERRORES...-->
                    @include('errores')

                    {!! Form::open(['route'=>'administracion.clientes.store','method'=>'POST','name'=>'formulario','autocomplete'=>'off']) !!}
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
                                {!! Form::checkbox('activo',1,1,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class='panel-footer'>
                    <div class='text-center'>
                        {!! Form::button('Guardar',['type'=>'submit','value'=>'Guardar','class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
