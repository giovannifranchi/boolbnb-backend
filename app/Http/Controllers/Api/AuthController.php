<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $fields = $request->validated();

        $newUser = new User();

        $newUser->name = $fields['name'];
        $newUser->email = $fields['email'];
        $newUser->password = bcrypt($fields['password']);

        $newUser->save();

        $token = $newUser->createToken('mytoken')->plainTextToken;

        $response = [
            'user'=>$newUser,
            'token'=>$token
        ];

        return response($response, 201);
    }

    public function login(LoginRequest $request){
        
        $fields = $request->validated();

        $user = User::where('email', $fields['email']);

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message'=>'invalid credentials',
            ], 401);
        }

        $token = $user->createToken('mytoken')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token
        ];

        return response($response, 200);
    }
}
