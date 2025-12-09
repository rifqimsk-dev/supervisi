<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah'
            ], 401);
        }

        // Generate OTP 6 digit
        $otp = rand(100000, 999999);

        // Simpan OTP ke database
        $user->otp_code = $otp;
        $user->otp_expired_at = Carbon::now()->addMinutes(5);
        $user->save();

        // Kirim email OTP
        Mail::to($user->email)->send(new OtpMail($otp));

        return response()->json([
            'message' => 'OTP telah dikirim ke email',
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'otp_code' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        if ($user->otp_code !== $request->otp_code) {
            return response()->json(['message' => 'OTP salah'], 400);
        }

        if (Carbon::now()->greaterThan($user->otp_expired_at)) {
            return response()->json(['message' => 'OTP sudah kadaluarsa'], 400);
        }

        // OTP valid → hapus OTP
        $user->otp_code = null;
        $user->otp_expired_at = null;
        $user->save();

        // Generate token login
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Verifikasi berhasil',
            'token' => $token,
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        // Hapus token yang dipakai saat ini
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout berhasil'
        ]);
    }
}