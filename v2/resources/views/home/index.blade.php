@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')

    <div class="mx-[20%] max-lg:mx-[10%]">
        <p class="font-bold text-4xl mx-auto w-fit m-6">Степаненко Мария Денисовна</p>
        <p class="text-2xl mx-auto w-fit m-6">ГРУППА: ИС/Б-20-1-О</p>

        <div
            class="bg-purple-100 border-purple-300 border-4 rounded-lg p-3 max-w-xl h-min break-inside-avoid-column mx-auto">
            <img src="{{ asset($photo->file_path) }}" title="{{ $photo->title }}" class="rounded" />
            <p class="font-bold mt-2 text-xl">{{ $photo->title }}</p>
        </div>

        <p class="text-2xl m-6 mx-auto w-fit mt-10">Доступные ссылки:</p>

        <div class="w-fit mx-auto">
            <a href="{{ route('discipline.test.index') }}"
                class='translation duration-300 border bg-purple-200 h-15 inline-block p-3 m-3 rounded-lg hover:bg-purple-300 hover:shadow text-xl'>Тест
                по дисциплине</a>

            <a href="{{ route('contacts.index') }}"
                class="translation duration-300 border bg-purple-200 h-15 inline-block p-3 m-3 rounded-lg hover:bg-purple-300 hover:shadow text-xl">Контакты</a>

            <a href="{{ route('interests.index') }}"
                class="translation duration-300 border bg-purple-200 h-15 inline-block p-3 m-3 rounded-lg hover:bg-purple-300 hover:shadow text-xl">Интересы</a>

            <a href="{{ route('guest.book.index') }}"
                class="translation duration-300 border bg-purple-200 h-15 inline-block p-3 m-3 rounded-lg hover:bg-purple-300 hover:shadow text-xl">Гостевая книга</a>


        </div>

    </div>
@endsection
