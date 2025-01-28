<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PostTestResult;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Gabungkan data user dan profile
        $data = [
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                'full_name' => $user->full_name
            ],
            'profile' => $user->profile ? [
                'birth_place' => $user->profile->birth_place,
                'birth_date' => $user->profile->birth_date,
                'gender' => $user->profile->gender
            ] : null,
            'last_three_scores' => PostTestResult::where('user_id', $user->id)
                ->latest()
                ->take(3)
                ->get()
                ->map(function ($result) {
                    return [
                        'score' => $result->score,
                        'date' => $result->created_at->format('Y-m-d H:i:s')
                    ];
                })
        ];

        return response()->json($data);
    }

    public function update(Request $request)
    {
        try {
            $user = auth()->user();

            // Validasi input
            $validated = $request->validate([
                'full_name' => 'required|string|max:255',
                'birth_place' => 'nullable|string|max:255',
                'birth_date' => 'nullable|date',
                'gender' => 'nullable|string|in:male,female',
            ]);

            // Update full name pada UserProfile
            $profile = $user->profile ?? new UserProfile(['user_id' => $user->id]);

            // Update profile dengan semua data
            $profile->fill([
                'full_name' => $validated['full_name'],  // full_name disimpan di UserProfile
                'birth_place' => $validated['birth_place'] ?? null,
                'birth_date' => $validated['birth_date'] ?? null,
                'gender' => $validated['gender'] ?? null,
            ]);

            // Save profile
            $profile->save();

            // Return response
            return response()->json([
                'message' => 'Profile updated successfully',
                'user' => [
                    'id' => $user->id,
                    'email' => $user->email,
                    'full_name' => $user->full_name
                ],
                'profile' => [
                    'full_name' => $profile->full_name,
                    'birth_place' => $profile->birth_place,
                    'birth_date' => $profile->birth_date,
                    'gender' => $profile->gender
                ],
                'last_three_scores' => PostTestResult::where('user_id', $user->id)
                    ->latest()
                    ->take(3)
                    ->get()
                    ->map(fn($result) => [
                        'score' => $result->score,
                        'date' => $result->created_at->format('Y-m-d H:i:s')
                    ])
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update profile',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
