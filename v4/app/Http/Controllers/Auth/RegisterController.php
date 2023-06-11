<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Rules\FullName;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register.index');
    }

    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'full_name' => ['required', new FullName()],
            'login' => 'required|unique:users,login',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ], [
            'required' => 'Необходимо заполнить это поле',
            'unique' => 'Уже занято',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $user = User::create([
            'full_name' => $request->full_name,
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 1
        ]);

        Auth::attempt([
            'login' => $user->login,
            'password' => $user->password,
        ]);

        Auth::login($user);

        return redirect()->intended(RouteServiceProvider::HOME)->with(['statusMessage' => 'Вы успешно зарегестрировали новый аккаунт']);
    }
}
