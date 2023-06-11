<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @vite(['resources/css/app.css'])
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <script>
        async function sendStatistic() {
            let response = await fetch("{{ route('v1.statistics.send') }}");
        }
        sendStatistic();
    </script>

    <div class="columns-auto h-auto w-full m-1">
        <a href="/" class='btn-default'>Главная</a>

        <a href="{{ route('photo.album.index') }}" class="btn-default">Фотоальбом</a>

        <a href="{{ route('blog.index') }}" class="btn-default">Мой блог</a>

        <div id="current_time" class="inline-block text-xl font-bold"></div>

        @guest
            <a href="{{ route('auth.register.index') }}" class='btn-default float-right'>Авторизоваться</a>

            <a href="{{ route('auth.login.index') }}" class='btn-default float-right'>Войти</a>
        @endguest

        @auth
            <form action="{{ route('auth.logout') }}"  class='btn-default float-right' method="POST">
                @csrf
                <input type="submit" value="Выйти">
            </form>

            <p class='btn-default float-right'>{{ auth()->user()->full_name }}</p>
        @endauth
    </div>

    @yield('content')

    @vite('resources/js/app.js')
</body>
