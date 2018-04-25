<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-dark.min.css">
    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
   
        <main class="py-4">
            @include('layouts.error')
            @include('layouts.success')
            <div class="container">
                <div class="row">
                    <div class="col-md-3 mb-sm-4">
                        <div class="card mb-4">
                            <img src="{{ $discussion->user->avatar }}" class="rounded-circle mx-auto m-4" style= "width: 100px; height: 100px"  alt="Card image cap">
                            <div class="card-body">
                                <h2 class="card-title text-center">
                                    {{ $discussion->user->name }}
                                </h2>
                                <p class="text-center">
                                <button class="btn btn-outline-warning btn-sm tece">{{ $discussion->user->points }} &#9733;</button>
                                </p>
                                <p class="card-text text-center">
                                    Thread: {{ $discussion->user->thread }}
                                </p>
                                <p class="card-text text-center">
                                    Replied: {{ $discussion->user->replied }}
                                </p>
                            </div>
                        </div>
                        <hr>
                        @guest
                        <a class="btn btn-link btn-block" href="{{ route('forum') }}">
                            &larr; Back
                        </a>
                        <hr>
                        @else
                        @if($discussion->is_being_watched_by_auth_user())
                            <a href="{{route('discussion.unwatch',['id' => $discussion->id])}}" class="btn btn-danger btn-block">UnSubscribe</a>
                        @else
                            <a href="{{route('discussion.watch',['id' => $discussion->id])}}" class="btn btn-primary btn-block">Subscribe</a>
                        @endif
                        
                        <a class="btn btn-link btn-block" href="{{ route('forum') }}">
                            &larr; Back
                        </a>
                        <hr>
                        @endguest
                    </div>
                    <div class="col-md-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</body>
</html>
