@extends('layouts.app')

@section('title', 'Интерес')

@section('content')

    <div class="mx-[20%] max-lg:mx-[10%]">
        <div class="bg-purple-100 border-purple-300 border-4 rounded-lg p-4 h-min break-inside-avoid-column">
            <p class="my-3 font-bold text-lg">Интерес: {{ $interest->title }}</p> 
            <p class="my-3 text-lg">Категория: {{ $interest->category()->title }}</p>
            <p class="my-3 text-lg">Описание: {{ $interest->description }}</p>
        </div>
    </div>
@endsection
