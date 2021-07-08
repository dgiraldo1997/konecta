<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ Config::get('app.appname')." - ".Config::get('app.appversion') }}</title>

    <!--DECLARACIÓN DE ESTILOS-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/opensans.css') }}">
    <link rel="stylesheet" href="{{ asset('css/barrademenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/iconmoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custombootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inputs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typeahead.css') }}">

    <!--DECLARACION DE SCRIPTS-->
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script type='text/javascript' src="{{ asset('js/jquery.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/Chart.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/typeahead.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/typeahead.bundle.js') }}"></script>

     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    @yield('scriptsadicionales','')
</head>
<body @yield('body')>
@if (Auth::guest())
<div class="portada">
@endif
<div id='wrapper'>
    <nav class="navbar navbar-default" style="background: #032556;">
        <div id='header' class="container-fluid">

            <!--MENU SMARTPHONE-->
            <div class="navbar-header" style="background: #FFFFFF;">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ url('/') }}"><img src="{{ asset('img/login.png') }}" height="60"
                                              alt="home"/></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!--MENU IZQUIERDO -->
                <ul class="nav navbar-nav">
                @if (Auth::guest())
                @else
                    <!--HOME-->
                        <li role="presentation" class="@yield('home','')" style='padding-left:8px'><a
                                    href="{{ url('/') }}"><span class="glyphicon glyphicon-home"
                                                                aria-hidden="true"></span> Inicio</a></li>

                        <!--Administracion-->
                        <li role="presentation" class="dropdown @yield('administracion','')">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span
                                        class="icon icon-earth"></span> Administracion<span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/administracion/clientes') }}"><span class="icon-user-tie"></span>
                                        Clientes</a></li>
                            </ul>
                        </li>

                        <!--SEGURIDAD-->
                        <li role="presentation" class="dropdown @yield('security','')">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span
                                        class="glyphicon glyphicon-lock"></span> Seguridad<span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/security/perfiles') }}"><span
                                                class="glyphicon glyphicon-lock"></span> Perfiles</a></li>
                                <li><a href="{{ url('/security/users') }}"><span
                                                class="glyphicon glyphicon-user"></span> Usuarios</a></li>
                                <li><a href="{{ url('/security/permisos') }}"><span
                                                class="glyphicon glyphicon-wrench"></span> Permisos</a></li>
                                <li role="separator" class="divider"></li>
                            </ul>
                        </li>
                        <!--ACERCA DE -->
                        <li role="presentation" class="dropdown @yield('ayuda','')">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span
                                        class="glyphicon glyphicon-question-sign"></span> Ayuda<span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/ayuda/acercade') }}"><span
                                                class="glyphicon glyphicon-info-sign"></span> Acerca de</a></li>
                                <li><a href="{{ url('/ayuda/enviarcomentario/create') }}"><span
                                                class="glyphicon glyphicon-comment"></span> Enviar Comentario</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>

                <!--MENU DERECHO -->
                <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <!--DO NOTHING-->
                    @else
                        <li class="dropdown">
                            <a style="padding:0px 0px;" href="#" class="dropdown-toggle" data-toggle="dropdown"
                               role="button" aria-expanded="false">
                                <img src="{{asset('img/cliente.png')}}" height="60px" width="80px"
                                     style="background: #FFFFFF; padding: 10px">
                                {{ Auth::user()->name }}<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="divider">
                                <li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-off"></span>
                                        Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>

            </div>


        </div>

    </nav>

    @yield('content')
    <br>
    <div id='footer' class='footer well well-sm' style='text-align:center;'>
        {{ Config::get('app.appname') }} {{ Config::get('app.appversion') }} es un software registrado de <span
                style="color:#1b809e;"> <a
                    href="https://www.linkedin.com/in/daniel-giraldo-ramirez/">DANIEL GIRALDO RAMIREZ</a></span> <!--licencia de uso para <span style="color:#1b809e;">{{ Config::get('app.nombrecliente') }}</span>-->
    </div>
</div>
@if (Auth::guest())
</div>
<style>
    .portada{
        background: url({{asset('img/fondo.jpg')}}) no-repeat fixed center;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        height: 100%;
        width: 100% ;
        text-align: center;

    }
</style>
@endif

<script>
    for (var i = 0; i < $('.dropdown-submenu').length; i++) {
        $($('.dropdown-submenu')[i]).submenupicker();
    }
</script>
</body>
</html>