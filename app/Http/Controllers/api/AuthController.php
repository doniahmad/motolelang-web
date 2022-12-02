<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'role' => 'required|in:admin,customer,owner',
        ]);

        $fields['role'] = 'customer';

        $fields['password'] = Hash::make($fields['password']);

        $user = User::create($fields);

        $user->assignRole($fields['role']);

        $token = $user->createToken('apptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return $response;
    }

    public function login(Request $request)
    {
        $error = 'Email or password invalid';

        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                /** @var User $user */
                $user = Auth::user();
                $token = $user->createToken('apptoken')->plainTextToken;

                return response([
                    'message' => 'succes',
                    'token' => $token,
                    'user' => $user
                ]);
            }
            return response([
                'message' => $error
            ], 401);
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response([
                'message' => 'succes'
            ]);
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
