@extends('app')
@section('ayuda')
active
@endsection

@section('content')
<div id='content' class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-comment"></span> Enviar Comentario</div>

                <div class="panel-body">
                    <!--VALIDACION DE ERRORES...-->
                    @include('errores')
                    {!! Form::open(['route'=>'ayuda.enviarcomentario.store','method'=>'POST','name'=>'formulario','autocomplete'=>'off']) !!}
                    <div class='form-horizontal'>
                            {!! Form::textarea('comentario',null,['class'=>'form-control','placeholder'=>'Envíanos tus comentarios acerca del programa...']) !!}
                    </div>
                    <br>
                    {!! Form::button('<span class="glyphicon glyphicon-send"></span> Enviar',['type'=>'submit','value'=>'Enviar','class'=>'btn btn-warning']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
