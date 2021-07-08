@extends('app')
@section('security')
active
@endsection

@section('content')
<div id='content' class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            
            @if(Session::has('mensajePermisos'))
            <p class='alert alert-success alert-dismissible' role='alert'>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('mensajePermisos') }}
            </p>
            @endif
            
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-wrench"></span> Definición de Permisos</div>

                <div class="panel-body">
                    {!! Form::open(['route'=>'security.permisos.store','method'=>'POST','name'=>'formulario','autocomplete'=>'off']) !!}
                    <div class='form-horizontal'>
                    <div class='form-group'>
                        {!! Form::label('lPerfil','Selecciona un Perfil:',['class'=>'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::select('perfil',$arrayperfiles,null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    </div>
                    <br>
                    {!! Form::button('Aceptar',['type'=>'submit','value'=>'Aceptar','class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection