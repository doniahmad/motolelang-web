<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\VerifyAccount;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function kirimEmailVerifikasi($user)
    {
        $token = Str::random(60);
        $user->verification_token = $token;
        $user->save();
        Notification::send($user, new VerifyAccount(($token)));
    }

    public function register(Request $request)
    {
        try {
            try {
                $fields = $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'handphone' => 'required|string|unique:users,handphone',
                    'password' => 'required|confirmed|min:8',
                ]);

                $fields['role'] = 'customer';

                $fields['password'] = Hash::make($fields['password']);

                $user = User::create($fields);

                $user->assignRole($fields['role']);

                $this->kirimEmailVerifikasi($user);

                return response()->json([
                    'status' => 'success',
                    'user' => $user
                ]);
            } catch (ValidationException $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => $e->errors(),
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function login(Request $request)
    {
        $error = 'Email or password invalid';

        try {

            if (Auth::attempt($request->only('email', 'password'))) {
                /** @var User $user */
                $user = Auth::user();
                $token = $user->createToken('apptoken')->plainTextToken;
                if ($user->email_verified_at === null) {
                    Auth::logout();
                    return response([
                        'status' => 'error',
                        'message' => 'Akun anda belum terverifikasi.'
                    ]);
                } else {
                    return response([
                        'status' => 'success',
                        'token' => $token,
                        'user' => $user
                    ]);
                }
            }
            return response([
                'status' => 'error',
                'message' => $error
            ], 401);
        } catch (ValidationException $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    public function loginAdmin(Request $request)
    {
        $error = 'Email or password invalid';
        $target = User::with('roles')->where('email', $request->email)->first();
        $role = $target->getRoleNames();
        try {
            if ($role[0] === 'admin' || $role[0] === 'kurir' || $role[0] === 'owner') {
                if (Auth::attempt($request->only('email', 'password'))) {
                    /** @var User $user */
                    $user = Auth::user();
                    $token = $user->createToken('apptoken')->plainTextToken;

                    return response([
                        'status' => 'success',
                        'token' => $token,
                        'user' => [$user, 'role' => $user->roles()->pluck('name')]
                    ]);
                }
            }
            return response([
                'status' => 'error',
                'message' => $error
            ], 401);
        } catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response([
                'message' => 'success'
            ]);
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    public function sendPasswordResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['message' => __($status)], 200);
        } else {
            return response()->json(['message' => __($status)], 400);
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ]);
                $user->save();
                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return response()->json(['message' => __($status)], 200);
        } else {
            throw ValidationException::withMessages([
                'email' => __($status)
            ]);
        }
    }

    public function verifikasiAkun(Request $request)
    {
        $token = $request->token;
        $user = User::where('verification_token', $token)->firstOrFail();
        $user->verification_token = null;
        $user->email_verified_at = Carbon::now();
        $user->save();

        return Redirect::to(route('login.index'));
    }
}
