<?php

namespace App\Http\Controllers\Api;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthStore;
use App\Http\Requests\VerificationMailStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(AuthStore $request)
    {
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response(['message' => 'Invalid Credentials']);
        }

        $token = auth()->user()->createToken('authToken')->accessToken;

        return response()->json(['message' => 'Login success', 'data' => ['user' => auth()->user(), 'token' => $token]], 200);
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        return response()->json(['message' => 'Logout success'], 200);
    }

    public function resendVerification(VerificationMailStore $request)
    {
        return event(new UserRegistered($request->input()));
    }

    public function userVerification($request)
    {

    }
}
