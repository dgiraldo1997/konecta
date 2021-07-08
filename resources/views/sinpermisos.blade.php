@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-danger">
                <div class="panel-heading"><h4>USUARIO NO AUTORIZADO</h4></div>

                <div class="panel-body">
                    <h1 class="col-md-2"><span style='color:#a94442;'class="glyphicon glyphicon-lock"> </span></h1>
                    <div class="col-md-10">Lo sentimos, usted no tiene permisos suficientes para ver este contenido.
                        <br>
                        Contacte con su administrador del sistema
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
