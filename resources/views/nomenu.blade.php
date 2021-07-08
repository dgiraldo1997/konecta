<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--DECLARACIÓN DE ESTILOS-->
        <!--<link rel="stylesheet" href="{{ asset('css/autocomplete.css') }}">-->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('fonts/opensans.css') }}">
        <link rel="stylesheet" href="{{ asset('css/iconmoon.css') }}">

        
        @yield('scriptsadicionales','')
    </head>
    <body>
        <div id='wrapper'>
            @yield('content')
            <br>
            <div id='footer' class='footer well well-sm' style='text-align:center;'>
                {{ Config::get('app.appname') }} {{ Config::get('app.appversion') }} es un software registrado de <span style="color:#1b809e;">SAINC INGENIEROS,</span> licencia de uso para <span style="color:#1b809e;">{{ Config::get('app.nombrecliente') }}</span>
            </div>
        </div>

    </body>

</html>
