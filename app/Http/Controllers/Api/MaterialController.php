<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        return response()->json([
            'status' => 'success',
            'data' => $materials
        ]);
    }

    public function show($id)
    {
        $material = Material::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'data' => $material
        ]);
    }
}
