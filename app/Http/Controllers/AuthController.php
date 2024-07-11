<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $feild = request()->validate([
            'name' => 'required|unique:users',
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);
        $user = User::create($feild);
        $token = $user->createToken($request->name);


        return response([
            'user' => $user,
            'token' => $token
            ,
            200
        ]);

    }
    public function login(Request $request)
    {
        request()->validate([
            "email" => "required|email|exits:users",
            "password" => "required"
        ]);

        // Auth::attempt()


    }
    public function logout(Request $request)
    {
        return 'logout';
    }

}
