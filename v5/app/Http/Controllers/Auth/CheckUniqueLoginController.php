<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class CheckUniqueLoginController extends Controller
{
    public function index(Request $request)
    {
        $xml = simplexml_load_string($request->xmlString, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $login = json_decode($json,TRUE)['login'];

        $validation = Validator::make(['login' => $login], [
            'login' => 'unique:users,login'
        ]);

        return response($validation->fails() ? 'true' : 'false');
    }
}