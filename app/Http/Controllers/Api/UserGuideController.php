<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserGuide;
use Illuminate\Http\Request;

class UserGuideController extends Controller {
    public function index() {
        $guides = UserGuide::all();
        return response()->json($guides);
    }
}
