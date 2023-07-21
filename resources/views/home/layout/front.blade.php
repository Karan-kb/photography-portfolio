<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Keshab Photography</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="{{asset('front/css/reset.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('front/css/plugins.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('front/css/style.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('front/css/yourstyle.css')}}">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="front/images/favicon.ico">
    </head>
<body>

    @include('home.includes.header')

    @include('home.includes.navbar')

    @yield('content')

    @include('home.includes.footer')
    <script type="text/javascript" src="{{asset('front/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/scripts.js')}}"></script>

</body>