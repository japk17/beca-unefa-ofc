<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema de Beca</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url(/images/pasantia_when.jpg);
                background-position: center top;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                border-bottom: 4px solid #2d90c4;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .footer {
                background-color: white;
                 position: absolute;
                 bottom: 0;
                 font-size: 20px;
                 width: 100%;
                 height: 50px;
                    }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Iniciar Sesión</a>
                        <!--<a href="{{ route('register') }}">Register</a>-->
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <h3 style="color:#2d90c4;text-shadow: 5px 5px 5px #FF0000,-5px -5px 5px #fff;";>
                    SISTEMA DE BECA</h3>
                </div>
                <!--<div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>-->
            </div>
        </div>
        <div class="footer" style="height:4%;">
        <footer class="main-footer" style="text-align: center">
        <strong>Copyright © 2019 <a href="http://www.unefa.edu.ve/portal/">UNEFA</a>.</strong>
        <b> Todos los derechos reservados.</b>
        </footer>
        </div>
    </body>
</html>
