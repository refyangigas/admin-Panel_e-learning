<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PreTest;
use App\Models\PostTest;
use App\Models\TestResult;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getPreTests()
    {
        $preTests = PreTest::all();
        return response()->json([
            'success' => true,
            'data' => $preTests
        ]);
    }

    public function getPostTests()
    {
        $postTests = PostTest::all();
        return response()->json([
            'success' => true,
            'data' => $postTests
        ]);
    }

    public function submitPostTest(Request $request)
    {
        $validated = $request->validate([
            'score' => 'required|numeric|min:0|max:100'
        ]);

        $result = TestResult::create([
            'user_id' => auth()->id(),
            'test_type' => 'post',
            'score' => $validated['score'],
            'completed_at' => now()
        ]);

        return response()->json([
            'success' => true,
            'data' => $result
        ]);
    }
}
