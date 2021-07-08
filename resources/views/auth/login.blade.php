@extends('app')

@section('content')
<div id='content' class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-warning">
                <div class="panel-heading" style="background: #032556; color: white; text-transform: uppercase;">Iniciar Sesión</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>No se puede iniciar sesión, verifica tu usuario y contraseña</strong><br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <div class="text-center">
                                <img src="{{ asset('img/login.png') }}"  height="100" alt="home"/>
                                <hr>

                            </div>
                            <div class="col-md-8 col-md-offset-2">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                                    {!! Form::text('username',old('username'),['class' => 'form-control','placeholder'=>'Usuario']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                    {!! Form::password('password',['class'=>'form-control','placeholder'=>'Contraseña']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('remember',null) !!}Recordar
                                        <!--<input type="checkbox" name="remember"> Remember Me-->
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                {!! Form::button('Iniciar Sesión',['type'=>'submit','class'=>'btn btn-primary','name'=>'login']) !!}
                                <!--<button type="submit" class="btn btn-primary">Login</button>-->

                                <a class="btn btn-link" href="{{ url('/password/email') }}">¿Olvidaste tu contraseña?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
