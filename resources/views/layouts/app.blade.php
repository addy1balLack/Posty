<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-light bg-white mb-5">
    <div class="container">

        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                @auth()
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('timeline') }}">Timeline</a>
                    </li>
                 @endauth

                @guest()
                    <li class="nav-item">
                        <a href="#" class="nav-link btn btn-primary btn-sm text-white">Create new Post</a>
                    </li>
                 @endguest
            </ul>

            <ul class="navbar-nav ml-auto">
                @auth()

                    <li class="nav-item mr-2">
                        <a href="#" class="nav-link">
                            {{ auth()->user()->username }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-white">Logout</button>
                        </form>
                    </li>

                    @endauth
                @guest()
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register.form') }}">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.form') }}">Sign in</a>
                    </li>
                @endguest

            </ul>

        </div>

    </div>
</nav>

<div class="container">
    @yield('content')
</div>


<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
