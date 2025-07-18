<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ config('app.name') }}</title>
</head>

<body class="bg-gray-200">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li><a class="p-3" href="{{route('home')}}">Home</a></li>
            <li><a class="p-3" href="{{route('dashboard')}}">Dahsboard</a></li>
            <li><a class="p-3" href="{{route('posts')}}">Posts</a></li>
        </ul>


        <ul class="flex items-center">

            @auth
                <li><a class="p-3" href="">{{ auth()->user()->username }}</a></li>

                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline p-3">
                        @csrf
                        <button type="submit" class="bg-transparent border-none cursor-pointer">Logout</button>
                    </form>
                </li>

            @endauth

            @guest
                <li><a class="p-3" href="{{ route('login') }}">Login</a></li>
                <li><a class="p-3" href="{{ route('register') }}">Register</a></li>
            @endguest
        </ul>
    </nav>
    @yield('content')

</body>

</html>
