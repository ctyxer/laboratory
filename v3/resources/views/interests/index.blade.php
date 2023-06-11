@extends('layouts.app')

@section('title', 'Интересы')

@section('content')

    <div class="mx-[30%] max-lg:mx-[10%]">
        @foreach ($categories as $category)
            <p class="m-6 font-bold text-lg">{{ $category->title }}</p>
            <div class="columns-2 space-y-4">
                @foreach ($interests->where('category_id', $category->id) as $interest)
                    <div class="bg-purple-100 border-purple-300 border-4 rounded-lg p-3 h-min break-inside-avoid-column hover:cursor-pointer"
                        onclick="window.location.href = '{{ route('interests.show', [$interest]) }}'">
                        <p class="m-3 font-bold inline-block">{{ $interest->title }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
