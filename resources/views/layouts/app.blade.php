<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

</head>
<body>
@include('layouts.header')
@yield('content')

@hassection('modal')
    @yield('modal')
@endif
<script src="/js/app.js"></script>

@hassection('javascript')
    @yield('javascript')
@endif
</body>
</html>
