@extends('layouts.app')

@section('title', 'Гостевая книга')

@section('content')

    <div class="mx-[20%] max-lg:mx-[10%]">
        @include('layouts.message')
        
        <p class="m-6 font-bold text-4xl text-center">Гостевая книга</p>
        <p class="m-6 font-bold text-3xl text-center">Оставить сообщение</p>
        <form action="{{ route('guest.book.store') }}" method="POST">
            @csrf
            <div class="my-4">
                <label for="full_name" class="block @error('full_name') text-red-400 @enderror">Введите
                    ФИО</label>
                <input type="text" name="full_name"
                    class="w-full border-2 border-purple-400 
                        rounded focus:outline-none
                        @error('full_name') border-red-400 @enderror"
                    placeholder="Степаненко Мария Денисовна" value="{{ old('full_name') }}">
            </div>

            <div class="my-4">
                <label for="email" class="block @error('email') text-red-400 @enderror">Электронная почта</label>
                <input type="text" name="email"
                    class="w-full border-2 border-purple-400 
                        rounded focus:outline-none
                        @error('email')border-red-400 @enderror"
                    placeholder="example@email.com" value="{{ old('email') }}">
            </div>

            <div class="my-4">
                <label for="message" class="block @error('message') text-red-400 @enderror">Текст отзыва</label>
                <textarea name="message" id="message" cols="30" rows="10"
                    class="w-full border-2 border-purple-400 rounded
                        focus:border-purple-400 focus:outline-none
                        @error('message') border-red-400 @enderror">{{ old('message') }}</textarea>
            </div>

            <input type="submit" value="Отправить"
                class='btn-default m-0'>
        </form>

        <div>
            <p class="m-6 font-bold text-3xl text-center mt-12">Оставленные сообщения</p>
            @if (count($messages))
                @foreach ($messages as $message)
                    <div class="bg-purple-100 border-purple-300 border-4 rounded-lg p-3 h-min m-2">
                        <p class="font-bold">{{ $message->full_name }}</p>
                        {{ $message->message }}
                    </div>
                @endforeach
            @else
                <p class="m-6 font-bold text-xl text-center mt-12">Тут пусто... Но это легко исправить!</p>
            @endif
        </div>
    </div>
@endsection
