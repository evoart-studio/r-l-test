<!doctype html>
<html lang="ru" class="h-100">
<head>
    <meta charset="utf-8">

    <title>@yield('title', config('app.name'))</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="EvoART Studio">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" media="screen" href="{{ mix('css/app.css') }}">
</head>
<body class="d-flex flex-column h-100">

@include('layouts.header')

<main class="flex-shrink-0">
    @yield('content')
</main>


@include('layouts.footer')

<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
