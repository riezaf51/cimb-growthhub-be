<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Helpers\ApiFormatter;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        try {
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);
        } catch (ValidationException $e) {
            return ApiFormatter::createApi(false, $e->errors(), null, 400);
        }

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return ApiFormatter::createApi(false, 'Invalid credentials', null, 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return ApiFormatter::createApi(true, 'Login successful', ['token' => $token], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return ApiFormatter::createApi(true, 'Logged out successfully', null, 200);
    }

    public function me(Request $request)
    {
        $userData = $request->user();
        $userData->role;
        $userData->profile;
        return ApiFormatter::createApi(true, 'User data retrieved', $userData, 200);
    }
}
