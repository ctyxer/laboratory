@extends('layouts.app')

@section('title', 'Тест по дисциплине')

@section('content')

    <div class="mx-[30%] max-lg:mx-[10%]">
        @include('layouts.message')

        <p class="m-6 font-bold text-4xl text-center">Тест по дисциплине</p>

        <form action="{{ route('discipline.test.store') }}" method="POST" id='test'>
            @csrf
            <div class="my-4">
                <label for="full_name" class="block @error('full_name') font-red-500 @enderror">Введите ФИО</label>
                <input type="text" name="full_name"
                    class="w-full border-2 border-purple-400 rounded @error('full_name') border-red-500 @enderror"
                    placeholder="Степаненко Мария Денисовна" value="{{ old('full_name') }}">
            </div>

            <div class="my-4">
                <p @error('full_name') class="font-red-500" @enderror>Выберите вашу группу</p>
                <select name="group" size="15"
                    class="bg-inherit focus:outline-none overflow-hidden border-purple-400 border-2 rounded p-1 @error('full_name') border-red-500 @enderror">
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
                <label for="email" class="block">Электронная почта</label>
                <input type="text" name="email"
                    class="w-full border-2 border-purple-400 rounded focus:outline-none @error('email') border-red-500 @enderror"
                    placeholder="example@email.com" value="{{ old('email') }}">
            </div>

            <div class="my-4">
                <p class="font-bold @error('question_1') text-red-500 @enderror">Вопрос №1</p>
                <legend>Логический тип:</legend>

                <div>
                    <input type="radio" id="question_1" name="question_1" value="float" class="accent-purple-500">
                    <label for="question_1">float</label>
                </div>
                <div>
                    <input type="radio" id="question_1_2" name="question_1" value="boolean" class="accent-purple-500">
                    <label for="question_1_2">boolean</label>
                </div>
            </div>

            <div class="my-4">
                <p class="font-bold @error('question_2') text-red-500 @enderror">Вопрос №2</p>
                <label for="question_2">2+2=?:</label>
                <select name="question_2" id="question_2"
                    class="w-full border-2 border-purple-400 rounded block @error('question_2') border-red-500 @enderror">
                    <option value="null" selected disabled>Выберите ответ</option>
                    <option value="100">100</option>
                    <option value="4">4</option>
                </select>
            </div>

            <div class="my-4">
                <p class="font-bold @error('question_3') text-red-500 @enderror">Вопрос №3</p>
                <label for="question_3" class="block">Имя первого программиста? (на русской раскладке в порядке "Имя
                    Фамилия")</label>
                <input type="text" name="question_3"
                    class="w-full border-2 border-purple-400 rounded focus:outline-none @error('question_3') border-red-500 @enderror"
                    placeholder="Линус Торвальдс" value="{{ old('question_3') }}">
            </div>

            <input type="submit" value="Отправить" class='btn-default m-0'>
        </form>
    </div>
@endsection
