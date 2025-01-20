<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PostTest;
use App\Models\User;
use Illuminate\Http\Request;

class PostTestController extends Controller
{
    public function index()
    {
        $postTests = PostTest::all();
        return response()->json([
            'success' => true,
            'data' => $postTests
        ]);
    }

    public function submitScore(Request $request)
    {
        $validated = $request->validate([
            'score' => 'required|numeric|min:0|max:100'
        ]);

        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan atau belum login.',
            ], 401);
        }

        User::where('id', $user->id)->update([
            'score' => $validated['score']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Score berhasil disimpan.',
        ]);
    }
}
