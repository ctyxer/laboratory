@if (Session::has('statusMessage'))
    <div class="border-2 rounded-lg border-purple-400 p-2 m-2">
        <p class="m-1 font-bold text-2xl">{{ Session::get('statusMessage') }}</p>
        @if (Session::has('statusSubMessage'))
            <p class="m-1 text-lg">{{ Session::get('statusSubMessage') }}</p>
        @endif
    </div>
@endif
