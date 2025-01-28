<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PostTestResult;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = $user->profile;

        // Mengambil 3 score terakhir
        $lastThreeScores = PostTestResult::where('user_id', $user->id)
            ->latest()
            ->take(3)
            ->get()
            ->map(function ($result) {
                return [
                    'score' => $result->score,
                    'date' => $result->created_at->format('Y-m-d H:i:s')
                ];
            });

        // Return response sesuai kebutuhan
        return response()->json([
            'profile' => $profile,
            'last_three_scores' => $lastThreeScores
        ]);
    }
}
