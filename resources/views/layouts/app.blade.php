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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datacard.css') }}" rel="stylesheet">
    <style>
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
    </style>
</head>
<body>
    <div id="app">
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
    </div>

<main class="py-4">
    @yield('content')
</main>
</div>
</body>
</html>
