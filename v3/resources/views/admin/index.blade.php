@extends('layouts.app')

@section('title', 'Панель администратора')

@section('content')

    <div class="mx-[20%] max-lg:mx-[10%]">
        <p class="text-4xl m-6 mx-auto w-fit mt-10 font-bold">Панель администратора</p>
        <p class="text-2xl m-6 mx-auto w-fit mt-10">Доступные ссылки:</p>

        <div class="w-fit mx-auto">
            <a href="{{ route('admin.blog.create') }}" class="btn-default m-0">
                Редактор блога</a>

            <a href="{{ route('admin.guest.book.download.index') }}" class="btn-default m-0">Загрузить
                гостевую книгу</a>

            <a href="{{ route('admin.statistics.index') }}" class="btn-default m-0">Посмотреть статистику</a>

        </div>

    </div>
@endsection
