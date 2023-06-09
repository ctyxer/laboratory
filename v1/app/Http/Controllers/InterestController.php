<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Interest;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    public function index()
    {
        $interests = Interest::all();

        $categories = Interest::select('category_id')
            ->groupBy('category_id')
            ->get()->toArray();
        $categories = Category::findMany($categories);

        return view('interests.index', [
            'interests' => $interests,
            'categories' => $categories
        ]);
    }
    public function show(Interest $interest)
    {
        return view('interests.show', [
            'interest' => $interest
        ]);
    }
}