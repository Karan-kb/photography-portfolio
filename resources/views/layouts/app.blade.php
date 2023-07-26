<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
 <style>
    
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #f7f7f7;
        color: #333;
    }

    .py-4 {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 150vh; 
        }

    .navbar {
        background-color: #fff;
        color: #333;
    }

    .navbar-brand,
    .navbar-nav .nav-link {
        color: #333;
    }

    .navbar-brand:hover,
    .navbar-nav .nav-link:hover {
        color: #555;
    }

    .py-4 {
        background-color: #fff;
    }

    

    
    .card {
        max-width: 400px;
        margin: 0 auto;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 20px;
        background-color: #fff;
    }

    .card-header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 12px;
        font-size: 18px;
        border-radius: 6px 6px 0 0;
    }

    .form-control {
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .form-control:focus {
        outline: none;
        border-color: #555;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #555;
    }

    .form-check-label {
        font-size: 14px;
    }

    /* Add more CSS styles for other elements as needed */
</style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @yield('content')
        </main>
    </div>
</body>
</html>
