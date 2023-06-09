@extends('layouts.app')

@section('title', 'Контакты')

@section('content')

    @if (Session::has('Сообщение'))
        <div class="bg-green-400 border-2 border-green-600 rounded-xl translation hover:bg-green-500 duration-300 m-6 p-3">
            <p class="font-bold text-lg">Успешно</p>
        </div>
    @endif

    @if (Session::has('errors'))
        @php
            $errors = Session::get('errors');
        @endphp

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

    <div class="mx-[30%]">
        <p class="m-6 font-bold text-4xl text-center">Форма ввода данных</p>

        <form action="{{ route('contacts.store') }}" method="POST" id='contacts'>
            @csrf
            <div class="my-4">
                <label for="Полное_имя" class="block">Введите ФИО</label>
                <input type="text" name="Полное_имя" class="w-full border-2 border-purple-400 rounded focus:outline-none"
                    placeholder="Степаненко Мария Денисовна">
            </div>

            <div class="my-4">
                <legend>Укажите ваш возраст:</legend>

                <div>
                    <input type="radio" id="менее 14" name="Возраст" value="менее 14" class="accent-purple-500">
                    <label for="менее 14">менее 14</label>
                </div>
                <div>
                    <input type="radio" id="14-17" name="Возраст" value="14-17" class="accent-purple-500">
                    <label for="14-17">14-17</label>
                </div>
                <div>
                    <input type="radio" id="18-25" name="Возраст" value="18-25" class="accent-purple-500">
                    <label for="18-25">18-25</label>
                </div>
                <div>
                    <input type="radio" id="26-41" name="Возраст" value="26-41" class="accent-purple-500">
                    <label for="26-41">26-41</label>
                </div>
                <div>
                    <input type="radio" id="42-65" name="Возраст" value="42-65" class="accent-purple-500">
                    <label for="42-65">42-65</label>
                </div>
                <div>
                    <input type="radio" id="более 65" name="Возраст" value="более 65" class="accent-purple-500">
                    <label for="более 65">более 65</label>
                </div>
            </div>

            <div class="my-4">
                <label for="Пол">Укажите ваш пол:</label>
                <select name="Пол" id="Пол" class="w-full border-2 border-purple-400 rounded block focus:outline-none">
                    <option value="" disabled selected>Выберите ваш пол</option>
                    <option value="female">Женский</option>
                    <option value="male">Мужской</option>
                </select>
            </div>

            <div class="my-4">
                <label for="Номер_телефона" class="block">Номер телефона</label>
                <input type="text" name="Номер_телефона" class="w-full border-2 border-purple-400 rounded focus:outline-none"
                    placeholder="(###) ###-##-##">
            </div>

            <div class="my-4">
                <label for="Электронная_почта" class="block">Электронная почта</label>
                <input type="text" name="Электронная_почта" class="w-full border-2 border-purple-400 rounded focus:outline-none"
                    placeholder="example@email.com">
            </div>

            <div class="my-4">
                <label for="День_рождения" class="block">Дата рождения</label>
                <input type="date" name="День_рождения" class="w-full border-2 border-purple-400 rounded focus:outline-none">
            </div>

            <div class="my-4">
                <label for="Сообщение" class="block">Текст сообщения</label>
                <textarea name="Сообщение" id="Сообщение" cols="30" rows="10"
                    class="w-full border-2 border-purple-400 rounded focus:border-purple-400 focus:outline-none"></textarea>
            </div>
            <input type="submit" value="Отправить"
                class='translation duration-300 border bg-purple-200 h-15 inline-block p-3 rounded-lg hover:bg-purple-300 hover:shadow text-xl'>
        </form>
    </div>
@endsection
