<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .navbar {
                height: 100px;
                width: 100%;
                margin: 0;
                padding: 0;
            }

            #AppItUpTitle {
                height: 38px;
                margin-left: 50px;
                padding: 0;
                background-color: #39D9AD;
                width: 140px;
                text-align: center;
                color: white;
                font-size: 24px;
                padding-top: 62px;
            }

            #tagline1 {
                position: absolute;
                left: 190px;
                top: 382px;
            }

            #tagline2 {
                position: absolute;
                left: 190px;
                top: 422px;
                font-weight: bold;
            }

            .circle {
                background-color: #39D9AD;
                opacity: 0.28;

            }

            #circle1 {
                position: absolute;
                top: 200px;
                left: -160px;
                z-index: 0;
                border-radius: 450px;
                width: 450px;
                height: 450px;
            }

            #circle2 {
                position: absolute;
                top: -150px;
                right: 70px;
                z-index: 0;
                border-radius: 300px;
                width: 300px;
                height: 300px;
            }

            .tagline {
                font-size: 36px;
                z-index: 1;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 57px;
                z-index: 1;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            #manClapping {
                position: absolute;
                right: 118px;
                top: 285px;
            }
        </style>
    </head>
    <body>
        <div class="navbar">
            <div id="AppItUpTitle">
                AppItUp
            </div>
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
            @endif
        </div>
        <div id="tagline1" class="tagline">
            Empowering Students
        </div>
        <div id="tagline2" class="tagline">
            Through Real Projects
        </div>
        <div id="circle1" class="circle"></div>
        <div id="circle2" class="circle"></div>
        <img id="manClapping" src="man-clapping.png">
    </body>
</html>
