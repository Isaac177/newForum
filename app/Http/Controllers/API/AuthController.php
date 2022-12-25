<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $user = $request->user();

            $tokenResult = $user->createToken($user->email);
            $token = $tokenResult->token;

            if ($request->remember_me) {
                $token->expires_at = Carbon::now()->addWeeks(1);
            }

            $token->save();

            if (Auth::check()) {
                return response()->json([
                    'message' => 'User is logged in',
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString(),
                    'email' => $user->email
                ], 200);
            } else {
                return response()->json([
                    'message' => 'User is not logged in',
                ], 401);
            }

        } else {
            return response()->json([
                'message' => 'Invalid email or password',
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->token()->revoke();
            return response()->json([
                'message' => 'Successfully logged out'
            ]);
        } else {
            return response()->json([
                'message' => 'You are not logged in'
            ], 401);
        }
    }

    public function show()
    {
        return response()->json(User::all());
    }
}
