@extends('layouts.app')

@section('title', 'Фотоальбом')

@section('content')

    <div class="mx-[20%]">
        <div class="bg-purple-100 border-purple-300 border-4 rounded-lg p-4 h-min break-inside-avoid-column">
            <p class="my-3 font-bold text-purple-600 text-lg">Интерес: {{ $interest->title }}</p> 
            <p class="my-3 text-purple-600 text-lg">Сатегория: {{ $interest->category()->title }}</p>
            <p class="my-3 text-purple-600 text-lg">Описание: {{ $interest->description }}</p>
        </div>
    </div>
@endsection
