<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login.index');
    }

    public function store(Request $request)
    {
        $credentials = $request->only(['login', 'password']);

        if(!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors(['message' => 'Что-то пошло не так. Проверьте правильность заполненных данных']);
        }

        Auth::login(User::where(['login' => $request->login])->first());

        return redirect()->back()->with(['statusMessage' => 'Вы успешно вошли в аккаунт']);
    }
}