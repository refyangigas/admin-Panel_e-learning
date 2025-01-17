<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserGuide;
use Illuminate\Http\Request;

class UserGuideController extends Controller
{
    public function index()
    {
        $userGuides = UserGuide::all();
        return view('admin.user-guides.index', compact('userGuides'));
    }

    public function create()
    {
        return view('admin.user-guides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required'
        ]);

        UserGuide::create($validated);
        return redirect()->route('admin.user-guides.index')
            ->with('success', 'Petunjuk Pengguna berhasil ditambahkan');
    }

    public function edit(UserGuide $userGuide)
    {
        return view('admin.user-guides.edit', compact('userGuide'));
    }

    public function update(Request $request, UserGuide $userGuide)
    {
        $validated = $request->validate([
            'content' => 'required'
        ]);

        $userGuide->update($validated);
        return redirect()->route('admin.user-guides.index')
            ->with('success', 'Petunjuk Pengguna berhasil diperbarui');
    }

    public function destroy(UserGuide $userGuide)
    {
        $userGuide->delete();
        return redirect()->route('admin.user-guides.index')
            ->with('success', 'Petunjuk Pengguna berhasil dihapus');
    }
}
