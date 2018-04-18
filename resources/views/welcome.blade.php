<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AppItUp</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset(css/index.css)}}" type="text/css">;
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
        <img id="manClapping" src="{{asset('assets/images/man-clapping.png')}}">
    </body>
</html>
