<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AppItUp</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
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

    #whoareyou {
        margin-left: 647px;
        margin-right: 647px;
        text-align: center;
        color: #4A4A4A;
        font-size: 24px;
        width: 200px;
    }

    .content {
        margin-top: 90px;
        width: 100%;
    }

    .row {
        width = 100%;
    }

    #data-cardSelect1 {
        position: relative;
        float: left;
        width: 30%;
        margin-left:10%;
        margin-right:10%;
    }

    #data-cardSelect2 {
        position: relative;
        float: right;
        width: 30%;
        margin-left:10%;
        margin-right:10%;
    }
    </style>
</head>
<body>
    <div class="navbar">
        <div id="AppItUpTitle">
            AppItUp
        </div>
        @guest
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
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <img src="/storage/avatars/{{Auth::user()->id}}/{{ Auth::user()->avatar }}" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%">
            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<span class="caret"></span>
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST"
        style="display: none;">
        @csrf
        </form>
    </div>
    @endguest
    <div id="app">
    </div>

<main class="content">
    @yield('content')
</main>
</div>
</body>
</html>
