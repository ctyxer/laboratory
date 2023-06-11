@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <div class="h-fit w-[28rem] mx-auto">
        @include('layouts.message')

        <p class="text-4xl m-6 mx-auto w-fit mt-10 font-bold">Регистрация</p>

        <form action="{{ route('auth.register.index') }}" method="POST"
            class="bg-white rounded-2xl p-4 m-4 border-2 border-purple-400">
            @csrf
            <div>
                <label for="full_name" class="block">ФИО</label>
                <input type="text" name="full_name"
                    class="w-full border-2 border-purple-400 rounded focus:outline-none @error('full_name') border-red-400 @enderror"
                    placeholder="Степаненко Мария Денисовна" value="{{ old('full_name') }}">
                @error('full_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="my-4" id='login'>
                <label for="login" class="block">Логин</label>
                <input type="text" name="login"
                    class="w-full border-2 border-purple-400 rounded focus:outline-none @error('login') border-red-400 @enderror"
                    placeholder="mashasua2" value="{{ old('login') }}" onchange="checkUniqueLogin(this)" id="login-input">
                @error('login')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
                <span class="text-red-500 text-sm hidden" id="login-span">Данный логин уже занят</span>
            </div>

            <div class="my-4">
                <label for="email" class="block">Почта</label>
                <input type="text" name="email"
                    class="w-full border-2 border-purple-400 rounded focus:outline-none @error('email') border-red-400 @enderror"
                    placeholder="example@email.com" value="{{ old('email') }}">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

            </div>


            <div class="my-4">
                <label for="password" class="block">Пароль</label>
                <input type="password" name="password"
                    class="w-full border-2 border-purple-400 rounded focus:outline-none @error('password') border-red-400 @enderror"
                    autocomplete="current-password">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <input type="submit" class="btn-default m-0">
        </form>
    </div>

    <script>
        let uniqueLogin = true;

        async function checkUniqueLogin(input) {
            let xmlDoc = document.implementation.createDocument(null, "data");
            let elements = xmlDoc.getElementsByTagName("data");

            let node = xmlDoc.createElement("login");
            node.innerHTML = input.value;
            elements[0].appendChild(node);

            let serializer = new XMLSerializer();
            let xmlString = serializer.serializeToString(xmlDoc);

            let response = await fetch('{{ route('v1.auth.login.check') }}', {
                'headers': {
                    'Content-Type': 'application/json',
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": document.querySelector('input[name="_token"]').value
                },
                'method': 'POST',
                'body': JSON.stringify({
                    xmlString
                })
            });

            let unique = !(await response.json());

            if (unique != uniqueLogin) {
                uniqueLogin = !uniqueLogin;
                document.querySelector('#login-input').classList.toggle('border-red-500');
                document.querySelector('#login-span').classList.toggle('hidden');
            }
        }
    </script>

@endsection
