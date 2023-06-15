<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $fields = $request->validated();

        $newUser = new User();

        $newUser->name = $fields['name'];
        $newUser->email = $fields['email'];
        $newUser->password = bcrypt($fields['password']);

        $token = $newUser->createToken('mytoken')->plainTextToken;

        $response = [
            'user'=>$newUser,
            'token'=>$token
        ];

        return response($response, 201);
    }
}
