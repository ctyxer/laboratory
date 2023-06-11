@extends('layouts.app')

@section('title', 'Панель администратора')

@section('content')

    <div class="mx-[10%]">
        <p class="text-4xl m-6 mx-auto w-fit mt-10 font-bold">Статистика сайта</p>

        <div class="w-fit mx-auto">
            <table>
                <tr>
                    <td>id</td>
                    <td>page</td>
                    <td>ip_adress</td>
                    <td>host_name</td>
                    <td>browser_name</td>
                    <td>created_at</td>
                </tr>
                @foreach ($statistics as $statistic)
                        <tr>
                            <td>{{ $statistic->id }}</td>
                            <td>{{ $statistic->page }}</td>
                            <td>{{ $statistic->ip_adress }}</td>
                            <td>{{ $statistic->host_name }}</td>
                            <td>{{ $statistic->browser_name }}</td>
                            <td>{{ $statistic->created_at }}</td>
                        </tr>
                @endforeach
            </table>

            {{ $statistics->links() }}
        </div>
    </div>
@endsection
