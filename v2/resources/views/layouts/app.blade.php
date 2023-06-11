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
    <a href="{{ url()->previous() }}"
        class='absolute translation duration-300 border bg-purple-200 h-15 block p-3 my-3 rounded-r-lg hover:bg-purple-300 hover:shadow text-xl'>Назад</a>

    <div class="columns-auto h-auto mx-auto w-fit m-6">
        <a href="/"
            class='btn-default'>Главная</a>

        <a href="{{ route('photo.album.index') }}"
            class="btn-default">Фотоальбом</a>

        <a href="{{ route('blog.index') }}"
            class="btn-default">Мой блог</a>
        <div id="current_time" class="inline-block text-xl font-bold"></div>
    </div>

    @yield('content')

    @vite('resources/js/app.js')
</body>
