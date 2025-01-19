<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function sendOTP(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:users'
            ]);

            // Generate 6 digit OTP
            $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

            // Save OTP to database
            $user = User::where('email', $request->email)->first();
            $user->otp = $otp;
            $user->save();

            // Send email
            Mail::send('emails.otp', ['otp' => $otp], function ($message) use ($request) {
                $message->to($request->email)
                    ->subject('Password Reset OTP');
            });

            return response()->json([
                'status' => 'success',
                'message' => 'OTP sent successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function verifyOTP(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:users',
                'otp' => 'required|string|size:6'
            ]);

            $user = User::where('email', $request->email)
                ->where('otp', $request->otp)
                ->first();

            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid OTP'
                ], 400);
            }

            // Clear OTP after successful verification
            $user->otp = null;
            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => 'OTP verified successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
