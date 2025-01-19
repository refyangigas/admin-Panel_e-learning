<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function sendOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT); // Generate 6 digit OTP

        $user->update([
            'otp' => $otp
        ]);

        // Kirim email
        Mail::send('emails.forgot-password', ['otp' => $otp], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password OTP');
        });

        return response()->json([
            'message' => 'OTP has been sent to your email'
        ]);
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|string',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if (!$user) {
            return response()->json([
                'message' => 'Invalid OTP'
            ], 400);
        }

        $user->update([
            'password' => bcrypt($request->password),
            'otp' => null
        ]);

        return response()->json([
            'message' => 'Password has been reset successfully'
        ]);
    }
}
