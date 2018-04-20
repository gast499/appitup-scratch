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
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">;
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
        <div class="top-right links">
            <a href="{{ route('profile') }}">Profile</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <img src="{{\Illuminate\Support\Facades\Storage::url('public/avatars')}}/{{Auth::user()->id}}/{{ Auth::user()->avatar }}" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%">
            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<span class="caret"></span>
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
<div id="circle1" class="circle"></div>
<div id="circle2" class="circle"></div>
</body>
</html>
