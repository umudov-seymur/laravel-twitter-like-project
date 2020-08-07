<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/twitter.css') }}">
    <title>Tweety</title>
</head>

<body>
    <div id="app">
        <header class="container flex justify-between mx-auto px-8 py-4 mb-6">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="/logo.svg" alt="">
                </a>
            </div>
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="{{ route('profile', [Auth::user()->id,'my']) }}" class="bg-blue-700 hover:bg-blue-500 text-white font-semibold py-2 px-4 border border-blue-500 hover:border-transparent rounded mr-2">My account</a>
                     <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Logout</button>
                </form>
            @endauth
        </header>
        <main class="container mx-auto px-8">
            <div class="lg:flex lg:justify-between">
                <div class="w-full lg:w-auto mb-4">
                    @auth
                        @include('_sidebar_links')
                    @endauth
                </div>
                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                    @yield('content')
                </div>
                @auth
                    <div class="w-full lg:w-1/6">
                        @include('_friends_list')
                    </div>
                @endauth
            </div>
        </main>
    </div>
</body>
</html>
