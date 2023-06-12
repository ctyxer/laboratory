@extends('layouts.app')

@section('title', 'Мой блог')

@section('content')

    <div class="mx-[20%] max-lg:mx-[5%]">
        @include('layouts.message')

        <div class="hidden" id="edit-box">
            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" id='edit-form'>
                @csrf

                <p class="font-bold text-4xl mx-auto w-fit m-6">Редактировать пост</p>

                <input type="hidden" name="id" id="id">

                <div class="my-4">
                    <label for="title" class="block">Заголовок</label>
                    <input type="text" name="title" id="title"
                        class="w-full border-2 border-purple-400 rounded focus:outline-none">
                </div>

                <div class="my-4">
                    <label for="description" class="block">Текст сообщения</label>
                    <textarea name="description" id="description" cols="30" rows="10"
                        class="w-full border-2 border-purple-400 rounded focus:border-purple-400 focus:outline-none">
                    </textarea>
                </div>

                <button class="btn-default m-0" type="button" onclick="updatePost()">Изменить</button>
                <button class="btn-default m-0" type="button" onclick="deletePost()">Удалить</button>
            </form>
        </div>


        <p class="font-bold text-4xl mx-auto w-fit m-6">Блог</p>

        <div class="space-y-4 my-2 columns-xs" id="posts-box">
        </div>

    </div>

    <script>
        let lastId = 0;

        function showBoxForm(postId, postTitle, postDescription) {
            let form = document.querySelector('#edit-form');
            window.scrollTo(0, 0);

            if (lastId != postId) {
                document.querySelector('#edit-box').classList.toggle('hidden');
                lastId = postId;
            }

            form.querySelector('#title').value = postTitle;
            form.querySelector('#description').innerHTML = postDescription;
            form.querySelector('#id').value = postId;
        }

        async function getPostsAndRender() {
            let response = await fetch('{{ route('v1.admin.blog.post.index') }}');
            let posts = await response.json();
            let postsBox = document.querySelector('#posts-box');

            postsBox.innerHTML = '';

            posts.forEach(post => {
                postsBox.innerHTML += `<div class="bg-purple-100 border-purple-300 border-4 rounded-lg p-3 h-min break-inside-avoid-column hover:cursor-pointer"
                    onclick="showBoxForm(${ post.id }, '${ post.title }', '${ post.description }')">
                    <div class="mt-2">
                        <p class="font-bold m-1">${post.title}</p>
                        <p class="m-1">${post.description}</p>
                    </div>
                </div>`;
            });
        }

        async function deletePost() {
            let form = document.querySelector('#edit-form');

            let response = await fetch('{{ route('v1.admin.blog.post.destroy') }}', {
                'method': 'POST',
                'body': new FormData(form)
            });

            let result = await response.json();
            
            getPostsAndRender();
            document.querySelector('#edit-box').classList.toggle('hidden');
        }

        async function updatePost() {
            let form = document.querySelector('#edit-form');

            let response = await fetch('{{ route('v1.admin.blog.post.update') }}', {
                'method': 'POST',
                'body': new FormData(form)
            });

            let result = await response.json();

            lastId = 0;
            getPostsAndRender();
            document.querySelector('#edit-box').classList.toggle('hidden');
        }

        getPostsAndRender();
    </script>
@endsection
