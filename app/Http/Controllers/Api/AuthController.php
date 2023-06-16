<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// TODOS: create an app token and add it to env, fix expiration date for tokens

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $fields = $request->validated();

        $newUser = new User();

        $newUser->name = $fields['name'];
        $newUser->email = $fields['email'];
        $newUser->password = bcrypt($fields['password']);

        $newUser->save();

        // $token = $newUser->createToken('mytoken')->plainTextToken;

        $token = $newUser->createToken('myapptoken',[], now()->addDays(2))->plainTextToken;

        $response = [
            'user'=>$newUser,
            'token'=>$token
        ];

        return response()->json($response, 201);
    }

    public function login(LoginRequest $request){
        
        $fields = $request->validated();

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message'=>'invalid credentials',
            ], 401);
        }

        $token = $user->createToken('mytoken', [], now()->addDays(2))->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token
        ];

        return response()->json($response, 200);
    }

    public function logout(Request $request){

        $user = $request->user(); 

        $user->tokens()->delete();

        return [
            'message'=>'logged out',
        ];

    }
}
