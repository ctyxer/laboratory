@extends('layouts.app')

@section('title', 'тест по дисциплине')

@section('content')

    @if (Session::has('message'))
        <div class="bg-green-400 border-2 border-green-600 rounded-xl translation hover:bg-green-500 duration-300 m-6 p-3">
            <p class="font-bold text-lg">Успешно. Ваши баллы: {{ Session::get('message') }} (макс. 3)</p>
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
        <p class="m-6 font-bold text-4xl text-center">Тест по дисциплине</p>

        <form action="{{ route('discipline.test.store') }}" method="POST" id='test'>
            @csrf
            <div class="my-4">
                <label for="full_name" class="block">Введите ФИО</label>
                <input type="text" name="Полное_имя" class="w-full border-2 border-purple-400 rounded"
                    placeholder="Степаненко Мария Денисовна">
            </div>

            <div class="my-4">
                <p>Выберите вашу группу</p>
                <select name="Группа" size="15" multiple="multiple"
                    class="bg-inherit focus:outline-none overflow-hidden border-purple-400 border-2 rounded p-1">
                    <optgroup label="1 курс">
                        <option value="1" class="checked:bg-purple-500">Ит/б-22-1-о</option>
                        <option value="2">Ит/б-22-2-о</option>
                    </optgroup>
                    <optgroup label="2 курс">
                        <option value="3">Ис/б-21-1-о</option>
                        <option value="4">Ис/б-21-2-о</option>
                        <option value="5">Ис/б-21-3-о</option>
                        <option value="6">Пи/б-21-1-о</option>
                    </optgroup>
                    <optgroup label="3 курс">
                        <option value="7">Ис/б-20-1-о</option>
                        <option value="8">Ис/б-20-2-о</option>
                        <option value="9">Пи/б-20-1-о</option>
                    </optgroup>
                    <optgroup label="4 курс">
                        <option value="10">Ис/б-19-1-о</option>
                        <option value="11">Пи/б-19-1-о</option>
                    </optgroup>
                </select>
            </div>

            <div class="my-4 mb-8">
                <label for="Почта" class="block">Электронная почта</label>
                <input type="text" name="Почта" class="w-full border-2 border-purple-400 rounded focus:outline-none"
                    placeholder="example@email.com">
            </div>

            <div class="my-4">
                <p class="font-bold">Вопрос №1</p>
                <legend>Логический тип:</legend>

                <div>
                    <input type="radio" id="question_1" name="Вопрос_1" value="float" class="accent-purple-500">
                    <label for="question_1">float</label>
                </div>
                <div>
                    <input type="radio" id="question_1_2" name="Вопрос_1" value="boolean" class="accent-purple-500">
                    <label for="question_1_2">boolean</label>
                </div>
            </div>

            <div class="my-4">
                <p class="font-bold">Вопрос №2</p>
                <label for="question_2">2+2=?:</label>
                <select name="Вопрос_2" id="question_2" class="w-full border-2 border-purple-400 rounded block">
                    <option value="null" selected disabled>Выберите ответ</option>
                    <option value="100">100</option>
                    <option value="4">4</option>
                </select>
            </div>

            <div class="my-4">
                <p class="font-bold">Вопрос №3</p>
                <label for="question_3" class="block">Имя первого программиста? (на русской раскладке в порядке "Имя Фамилия")</label>
                <input type="text" name="Вопрос_3" class="w-full border-2 border-purple-400 rounded focus:outline-none"
                    placeholder="Линус Торвальдс">
            </div>

            <input type="submit" value="Отправить"
                class='translation duration-300 border bg-purple-200 h-15 inline-block p-3 rounded-lg hover:bg-purple-300 hover:shadow text-xl'>
        </form>
    </div>
@endsection
