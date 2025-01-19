<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MaterialResource;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => MaterialResource::collection($materials)
        ]);
    }

    public function show($id)
    {
        $material = Material::find($id);

        if (!$material) {
            return response()->json([
                'status' => false,
                'message' => 'Material not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => new MaterialResource($material)
        ]);
    }
}
