<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <a href="{{ url()->previous() }}"
        class='absolute translation duration-300 border bg-purple-200 h-15 block p-3 my-3 rounded-r-lg hover:bg-purple-300 hover:shadow text-xl'>Назад</a>

    <div class="columns-auto h-auto mx-auto w-fit m-6">
        <a href="/"
            class='translation duration-300 border bg-purple-200 h-15 inline-block p-3 m-3 rounded-lg hover:bg-purple-300 hover:shadow text-xl'>Главная</a>

        <a href="/biography"
            class='translation duration-300 border bg-purple-200 h-15 inline-block p-3 m-3 rounded-lg hover:bg-purple-300 hover:shadow text-xl'>Биография</a>

        <a href="{{ route('photo.album.index') }}"
            class="translation duration-300 border bg-purple-200 h-15 inline-block p-3 m-3 rounded-lg hover:bg-purple-300 hover:shadow text-xl">Фотоальбом</a>

        <a href="/contacts"
            class="translation duration-300 border bg-purple-200 h-15 inline-block p-3 m-3 rounded-lg hover:bg-purple-300 hover:shadow text-xl">Контакты</a>

        <a href="{{ route('interests.index') }}"
            class="translation duration-300 border bg-purple-200 h-15 inline-block p-3 m-3 rounded-lg hover:bg-purple-300 hover:shadow text-xl">Интересы</a>

        <div id="current_time" class="inline-block text-xl text-purple-600 font-bold"></div>
    </div>

    @if (count($errors))
        <div class="bg-red-400 border-2 border-red-600 rounded-xl translation hover:bg-red-500 duration-300 m-6 p-3">
            <p class="font-bold text-lg mb-2">Что-то пошло не так</p>
            <ul>
                @foreach ($errors as $key => $error)
                    <li>
                        {{ $key }}:
                        <ul>
                            @foreach ($error as $errorDescription)
                                <li class="mx-2">
                                    {{ $errorDescription }}
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

    @endif

    @yield('content')

    <script>
        /* функция добавления ведущих нулей */
        /* (если число меньше десяти, перед числом добавляем ноль) */
        function zeroFirstFormat(value) {
            if (value < 10) {
                value = '0' + value;
            }
            return value;
        }

        /* функция получения текущей даты и времени на устройстве */
        function currentTime() {
            var current_datetime = new Date();
            var date = zeroFirstFormat(current_datetime.getDate());
            var month = zeroFirstFormat(current_datetime.getMonth() + 1);
            var year = current_datetime.getFullYear();
            var hours = zeroFirstFormat(current_datetime.getHours());
            var minutes = zeroFirstFormat(current_datetime.getMinutes());
            var seconds = zeroFirstFormat(current_datetime.getSeconds());

            return `${date}.${month}.${year} ${hours}:${minutes}:${seconds}`;
        }

        function setCurrentTime() {
            document.getElementById('current_time').innerHTML = currentTime();
        }

        setCurrentTime();
        setInterval(() => {
            setCurrentTime()
        }, 1000);
    </script>
</body>
