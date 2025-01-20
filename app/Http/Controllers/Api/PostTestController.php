<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PostTest;
use App\Models\TestResult;
use Illuminate\Http\Request;

class PostTestController extends Controller
{
    public function index()
    {
        $postTests = PostTest::all();
        return response()->json([
            'success' => true,
            'data' => $postTests,
            'total' => $postTests->count()
        ]);
    }

    public function getQuestion($index)
    {
        $question = PostTest::skip($index-1)->take(1)->first();

        if (!$question) {
            return response()->json([
                'success' => false,
                'message' => 'Soal tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $question,
            'current_number' => $index
        ]);
    }

    public function submitResult(Request $request)
    {
        $validated = $request->validate([
            'score' => 'required|numeric|min:0|max:100',
            'total_questions' => 'required|numeric',
            'correct_answers' => 'required|numeric'
        ]);

        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan atau belum login.',
            ], 401);
        }

        $testResult = TestResult::create([
            'user_id' => $user->id,
            'test_type' => 'post',
            'score' => $validated['score'],
            'total_questions' => $validated['total_questions'],
            'correct_answers' => $validated['correct_answers']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Hasil post-test berhasil disimpan.',
            'data' => $testResult
        ]);
    }
}
