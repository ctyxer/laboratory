<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::latest()->paginate(20);

        return view('admin.statistics.index', [
            'statistics' => $statistics
        ]);
    }
}
