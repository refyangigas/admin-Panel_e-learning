<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PreTest;
use App\Models\PostTest;
use App\Models\PreTestResult;
use App\Models\PostTestResult;
use Illuminate\Http\Request;

class TestController extends Controller
{
    // Get all pre-test questions
    public function getPreTestQuestions()
    {
        $questions = PreTest::all();

        return response()->json([
            'success' => true,
            'data' => $questions,
            'total' => $questions->count()
        ]);
    }

    // Get specific pre-test question
    public function getPreTestQuestion($index)
    {
        $question = PreTest::skip($index - 1)->first();

        if (!$question) {
            return response()->json([
                'success' => false,
                'message' => 'Question not found'
            ], 404);
        }

        $total = PreTest::count();

        return response()->json([
            'success' => true,
            'data' => $question,
            'total' => $total
        ]);
    }

    // Get all post-test questions
    public function getPostTestQuestions()
    {
        $questions = PostTest::all();

        return response()->json([
            'success' => true,
            'data' => $questions,
            'total' => $questions->count()
        ]);
    }

    // Get specific post-test question
    public function getPostTestQuestion($index)
    {
        $question = PostTest::skip($index - 1)->first();

        if (!$question) {
            return response()->json([
                'success' => false,
                'message' => 'Question not found'
            ], 404);
        }

        $total = PostTest::count();

        return response()->json([
            'success' => true,
            'data' => $question,
            'total' => $total
        ]);
    }

    // Submit pre-test result
    public function submitPreTest(Request $request)
    {
        $validated = $request->validate([
            'score' => 'required|numeric|min:0|max:100',
            'total_questions' => 'required|integer|min:1',
            'correct_answers' => 'required|integer|min:0'
        ]);

        $result = PreTestResult::create([
            'user_id' => auth()->id(),
            'score' => $validated['score'],
            'total_questions' => $validated['total_questions'],
            'correct_answers' => $validated['correct_answers']
        ]);

        return response()->json([
            'success' => true,
            'data' => $result
        ]);
    }

    // Submit post-test result
    public function submitPostTest(Request $request)
    {
        $validated = $request->validate([
            'score' => 'required|numeric|min:0|max:100',
            'total_questions' => 'required|integer|min:1',
            'correct_answers' => 'required|integer|min:0'
        ]);

        $result = PostTestResult::create([
            'user_id' => auth()->id(),
            'score' => $validated['score'],
            'total_questions' => $validated['total_questions'],
            'correct_answers' => $validated['correct_answers']
        ]);

        return response()->json([
            'success' => true,
            'data' => $result
        ]);
    }
}
