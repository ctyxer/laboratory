@if (Session::has('errors'))
    @php
        $errors = Session::get('errors');
    @endphp

    <div class="bg-red-400 border-2 border-red-600 rounded-xl translation hover:bg-red-500 duration-300 m-6 p-3">
        <p class="font-bold text-lg mb-2">Что-то пошло не так</p>
        <ul>
            @foreach ($errors as $key => $error)
                <li>
                    {{ $key }}:
                    <ul>
                        @foreach ($error as $errorDescription)
                            <li class="mx-2">
                                {{ $errorDescription }}
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
@endif
