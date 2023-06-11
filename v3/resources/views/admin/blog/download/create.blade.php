@extends('layouts.app')

@section('title', 'Редактор блога')

@section('content')

    <div class="mx-[30%] max-lg:mx-[10%]">
        <p class="font-bold text-4xl mx-auto w-fit m-6">Загрузка CSV файла</p>

        <form action="{{ route('admin.blog.download.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="my-4">
                <label for="file" class="block">Файл</label>
                <input type="file" name="file" class="w-full border-2 bg-white border-purple-400 rounded focus:outline-none @error('file') border-red-400 {{ $message }} @enderror">
            </div>

            <input type="submit" value="Загрузить" class="btn-default m-0">
        </form>
    </div>
@endsection
