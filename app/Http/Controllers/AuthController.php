<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email',$fields['email'])->first();
        if(!$user || !Hash::check($fields['password'],$user->password)){
            return response([
                'message' => 'Wrong Credentials',
            ], 401);
        }
        $token = $user->createToken('cisToken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return $response;
    }
    public function logout(Request $request) {
        $request->user()->tokens()->delete();

        return [
            'message' => 'Logged out',
        ];
    }
}
