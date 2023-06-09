@extends('layouts.app')

@section('title', 'Гостевая книга')

@section('content')

    <div class="mx-[20%]">
        <p class="m-6 font-bold text-4xl text-center">Гостевая книга</p>
        <p class="m-6 font-bold text-3xl text-center">Оставить сообщение</p>
        <form action="{{ route('guest.book.store') }}" method="POST">
            @csrf
            <div class="my-4">
                <label for="full_name" class="block">Введите ФИО</label>
                <input type="text" name="Полное_имя" class="w-full border-2 border-purple-400 rounded focus:outline-none"
                    placeholder="Степаненко Мария Денисовна">
            </div>

            <div class="my-4">
                <label for="email" class="block">Электронная почта</label>
                <input type="text" name="email"
                    class="w-full border-2 border-purple-400 rounded focus:outline-none" placeholder="example@email.com">
            </div>

            <div class="my-4">
                <label for="message" class="block">Текст отзыва</label>
                <textarea name="message" id="message" cols="30" rows="10"
                    class="w-full border-2 border-purple-400 rounded focus:border-purple-400 focus:outline-none"></textarea>
            </div>
        </form>
    </div>
@endsection
