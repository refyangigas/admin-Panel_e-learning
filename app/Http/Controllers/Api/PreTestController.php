<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PreTest;

class PreTestController extends Controller
{
    public function index()
    {
        $preTests = PreTest::all();
        return response()->json([
            'success' => true,
            'data' => $preTests
        ]);
    }
}
