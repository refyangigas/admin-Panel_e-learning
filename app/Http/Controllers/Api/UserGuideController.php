<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserGuide;
use Illuminate\Http\Request;

class UserGuideController extends Controller
{
    public function index()
    {
        $guides = UserGuide::all();
        return response()->json([
            'status' => 'success',
            'data' => $guides
        ]);
    }
}
