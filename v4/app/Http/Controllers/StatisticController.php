<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function send(Request $request)
    {
        Statistic::create([
            'page' => url()->previous(),
            'ip_adress' => $_SERVER['REMOTE_ADDR'],
            'host_name' => gethostbyaddr($_SERVER['REMOTE_ADDR']),
            'browser_name' => $_SERVER['HTTP_USER_AGENT']
        ]);

        return response(200);
    }
}