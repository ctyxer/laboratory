@extends('layouts.app')

@section('title', 'Мой блог')

@section('content')


    <div class="mx-[30%] max-lg:mx-[10%]">
        @include('layouts.message')
        

        <div
            class="bg-purple-100 border-purple-300 border-4 rounded-lg p-3 h-min w-fit mx-auto break-inside-avoid-column hover:cursor-pointer">
            @if ($post->image_path != null)
                <img src="{{ asset($post->image_path) }}" title="{{ $post->title }}" class="rounded h-auto" />
            @endif
            <div class="mt-2">
                <p class="font-bold m-1">{{ $post->title }}</p>
                <p class="m-1">{{ $post->description }}</p>
            </div>
        </div>

        <p class="font-bold text-2xl mx-auto w-fit m-6 mt-12">Комментарии</p>

        <div id='comments'></div>

        @auth
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <form id="comment-form" method="POST" action='{{ route('v1.comments.store', [$post]) }}'
                class="bg-purple-100 border-purple-300 border-4 rounded-lg p-3 h-min mx-auto break-inside-avoid-column hover:cursor-pointer">
                @csrf

                <input type="hidden" name="author_id" value="{{ auth()->user()->id }}">
                <p class="font-bold text-xl mx-auto m-1">Отправить комментарий</p>

                <label for="text">Текст комментария</label>
                <textarea type="text" name="text" id="text" rows="3"
                    class="w-full border-2 border-purple-400 rounded focus:outline-none"></textarea>
                <button class="btn-default" onclick="sendComment()" type="button">Отправить</button>
            </form>
        @endauth
    </div>

    <script>
        function getCommentsAndRender() {
            let xhr = new XMLHttpRequest();

            xhr.open('GET', '{{ route('v1.comments.index', [$post->id]) }}');
            xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
            xhr.send();

            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    let response = xhr.responseText;

                    document.querySelector('#comments').innerHTML = response;
                }
            }
        }

        function sendComment() {
            let xhr = new XMLHttpRequest();

            let form = document.querySelector('#comment-form');

            xhr.open('POST', '{{ route('v1.comments.store', [$post]) }}');
            xhr.send(new FormData(form));

            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    getCommentsAndRender();
                }
            }
        }

        getCommentsAndRender();
    </script>
@endsection
