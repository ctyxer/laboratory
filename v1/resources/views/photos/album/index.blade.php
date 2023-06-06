@extends('layouts.app')

@section('title', 'Фотоальбом')

@section('content')

    <div class="columns-xs mx-[20%] space-y-4">
        @foreach ($photos as $photo)
            <div class="bg-purple-100 border-purple-300 border-4 rounded-lg p-3 h-min break-inside-avoid-column">
                <img src="{{ asset('storage/' . $photo->file_path) }}" title="{{ $photo->title }}" class="rounded h-auto" />
                <div class="border-t-transparent border-4 rounded-t-none rounded border-purple-300 bottom-0">
                    <p class="font-bold m-1">{{ $photo->title }}</p>
                </div>
            </div>
        @endforeach
    </div>

@endsection
