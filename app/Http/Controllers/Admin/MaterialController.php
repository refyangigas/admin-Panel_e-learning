<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;

// app/Http/Controllers/Admin/MaterialController.php
class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        return view('admin.materials.index', compact('materials'));
    }

    public function create()
    {
        return view('admin.materials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required'
        ]);

        Material::create($validated);
        return redirect()->route('admin.materials.index')
            ->with('success', 'Materi berhasil ditambahkan');
    }

    public function edit(Material $material)
    {
        return view('admin.materials.edit', compact('material'));
    }

    public function update(Request $request, Material $material)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required'
        ]);

        $material->update($validated);
        return redirect()->route('admin.materials.index')
            ->with('success', 'Materi berhasil diperbarui');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('admin.materials.index')
            ->with('success', 'Materi berhasil dihapus');
    }
}
