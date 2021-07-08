@extends('app')
@section('security')
active
@endsection

@section('content')
<div id='content' class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class='text-center'>
                        <span class='pull-left'> <a href="{{ url('/security/perfiles') }}" class="btn btn-success btn-xs"><span class="icon-arrow-left"></span> Atrás</a></span>
                        <span class='pull-center'><span class="glyphicon glyphicon-lock"></span> Nuevo Perfil</span>
                    </div>
                </div>

                <div class="panel-body">
                    <!--VALIDACION DE ERRORES...-->
                    @include('errores')

                    {!! Form::open(['route'=>'security.perfiles.store','method'=>'POST','name'=>'formulario','autocomplete'=>'off']) !!}
                    <div class='form-horizontal'>
                        <div class='form-group'>
                            {!! Form::label('lNombre','Nombre:',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('nombre',null,['class'=>'form-control']) !!}
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
