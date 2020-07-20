<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ ('css/twitter.css') }}">
    <!-- CSRF Token -->
    <title>Tweety</title>
</head>
<body>
    <div id="app">
        <header class="container mx-auto px-8 py-4 mb-6">
            <div class="logo">
                <img src="/logo.svg" alt="">
            </div>
        </header>
        <main class="container mx-auto px-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
