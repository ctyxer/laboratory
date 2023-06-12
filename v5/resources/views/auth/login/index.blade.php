@extends('layouts.app')

@section('title', 'Войти в аккаунт')

@section('content')

    <div class="h-fit w-[28rem] mx-auto">
        @include('layouts.message')

        <p class="text-4xl m-6 mx-auto w-fit mt-10 font-bold">Войти в аккаунт</p>

        <form action="{{ route('auth.login.index') }}" method="POST"
            class="bg-white rounded-2xl p-4 m-4 border-2 border-purple-400">
            @csrf

            @error('message')
                <span class="text-red-500 font-bold">{{ $message }}</span>
            @enderror
            
            <div class="my-4">
                <label for="login" class="block">Логин</label>
                <input type="text" name="login"
                    class="w-full border-2 border-purple-400 rounded focus:outline-none @error('login') border-red-400 @enderror"
                    value="{{ old('login') }}">
                @error('login')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

            </div>


            <div class="my-4">
                <label for="password" class="block">Пароль</label>
                <input type="password" name="password"
                    class="w-full border-2 border-purple-400 rounded focus:outline-none @error('password') border-red-400 @enderror">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <input type="submit" class="btn-default m-0">
        </form>
    </div>
@endsection
