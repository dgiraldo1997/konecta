@extends('app')
@section('ayuda')
active
@endsection

@section('content')
<div id='content' class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-info-sign"></span> Acerca de DANIEL GIRALDO</div>
                <div class="panel-body">
                    <div class="col-sm-12 text-center">
                        <a href="http://www.sainc.co" target="_blank"><img src="{{ asset('img/login.png') }}" width="250px"></a>
                        <hr>
                    </div>
                    {{ Config::get('app.appname') }} es un Software registrado de DANIEL GIRALDO
                    creado por DANIEL GIRALDO se prohíbe su
                    distribución total o parcial, Reservados todos los derechos.
                    <br>
                    Cualquier distribución total o parcial realizada sin la
                    autorización expresa escrita del autor tendrá sanciones legales.
                    Cualquier daño o prejuicio causado por el mal uso del software
                    será responsabilidad del usuario.
                    <br>
                    <br>
                    CopyRight (c) 2021 DANIEL GIRALDO RAMIREZ Todos los Derechos Reservados.
                    
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
