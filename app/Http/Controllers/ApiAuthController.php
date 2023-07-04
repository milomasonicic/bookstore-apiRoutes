<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "password"=>"required",
        ]);

        $user = new User([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        $user->save();
    }

    public function login(Request $request)
    {

        $credentials = request(['email','password']);

        if(! Auth::attempt($credentials)){
            return response()->json([
                'message'=>'Unatorized'
            ], 401);
        }

        $user=$request->user();
        $tokenResult=$user->CreateToken('Personal Access Token');
        $token= $tokenResult->plainTextToken;

        //$token->save();

        return ("logovan");

    }
}
