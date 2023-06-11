@extends('layouts.app')

@section('title', 'Мой блог')

@section('content')

    <div class="mx-[20%] max-lg:mx-[10%]">
        @include('layouts.message')

        <p class="font-bold text-4xl mx-auto w-fit m-6">Мой блог</p>

        <div class="columns-xs space-y-4 my-2">
            @foreach ($posts as $post)
                <div class="bg-purple-100 border-purple-300 border-4 rounded-lg p-3 h-min break-inside-avoid-column">
                    @if ($post->image_path != null)
                        <img src="{{ asset($post->image_path) }}" title="{{ $post->title }}" class="rounded h-auto" />
                    @endif
                    <div class="mt-2">
                        <p class="font-bold m-1">{{ $post->title }}</p>
                        <p class="m-1">{{ $post->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="w-fit m-2">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
