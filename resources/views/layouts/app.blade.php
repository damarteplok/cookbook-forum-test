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
                    <div class="col-md-3 mb-4 mb-sm-0">

                        
                        <a href="{{ route('discussions.create') }}" class="form-control btn btn-primary mb-3">Create a new discussion</a>
                        @guest
                        @else
                        <div class="card mb-3">
                            @if(Auth::check())
                            @if(Auth::user()->admin)
                            <div class="card-header">
                               &#9776; Dashboard Admin
                            </div>
                            @else
                            <div class="card-header">
                               &#9776; Dashboard Member
                            </div>
                            @endif
                            @endif
                            <div class="card-body px-1">
                                <div class="list-group">
                                    @if(Auth::check())
                                    @if(Auth::user()->admin)
                                    <li class="list-group-item">
                                        <a href="/channels/create"
                                            style="text-decoration: none;">
                                        Create Channels
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="/channels"
                                            style="text-decoration: none;">
                                        Edit Channels
                                        </a>
                                    </li>
                                    @endif
                                    @endif
                                    
                                    <li class="list-group-item">
                                        <a href="/forum?filter=me"
                                            style="text-decoration: none;">
                                        My thread
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="/forum?filter=solved"
                                            style="text-decoration: none;">
                                        My closed thread
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="/forum?filter=unsolved"
                                            style="text-decoration: none;">
                                        My unanswered thread
                                        </a>
                                    </li>
                                
                                </div>
                            </div>
                        </div>
                        @endguest
                        

                        <div class="card">
                            <div class="card-header">
                                Channels
                            </div>
                            <div class="card-body px-1">
                                <div class="list-group">
                                    
                                        <a href="{{ route('forum') }}"
                                            style="text-decoration: none;" class="list-group-item  list-group-item-action active">
                                        Home
                                        </a>
                                    </li>
                                    @foreach($channels as $channel)
                                        <li class="list-group-item">
                                            <a href="{{ route('channel', ['slug' => $channel->slug ]) }}"
                                                style="text-decoration: none;">
                                            {{ $channel->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
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
