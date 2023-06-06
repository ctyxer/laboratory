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
    <div class="header-menu">
        <nav>
            <ul>
                <li> <a href="/">Главная</a> </li>
                <li> <a href="/biography">Биография</a> </li>
                <div class="dropdown">

                    <div class="dropdown-content" id="myDropdown">
                        <a href="/my_hobby#first-story">Ссылка 1</a>
                        <a href="/my_hobby#second-story">Ссылка 2</a>
                        <a href="/my_hobby#third-story">Ссылка 3</a>
                    </div>

                    <li>
                        <a button class="dropbtn" onclick="myFunction()"> Интересы (Выпадающий) </a>
                        <i class="fa fa-caret-down"></i>
                        </button>
                    </li>

                    <li> <a href="/studies">Учеба</a> </li>
                    <li> <a href="/photo_album">Фотоальбом</a> </li>
                    <li> <a href="/contacts">Контакты</a> </li>
                    <li> <a href="/test">Тест по дисциплине</a> </li>
                    <li>
                        <div id="current_date_time_block" class="RealDate"></div>
                    </li>

                </div>
            </ul>
        </nav>
    </div>

    @yield('content')

</body>
