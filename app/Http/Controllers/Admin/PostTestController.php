<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostTest;
use Illuminate\Http\Request;

class PostTestController extends Controller
{
    public function index()
    {
        $postTests = PostTest::all();
        return view('admin.post-tests.index', compact('postTests'));
    }

    public function create()
    {
        return view('admin.post-tests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_answer' => 'required|in:a,b,c,d'
        ]);

        PostTest::create($validated);
        return redirect()->route('admin.post-tests.index')
            ->with('success', 'Soal Post Test berhasil ditambahkan');
    }

    public function edit(PostTest $postTest)
    {
        return view('admin.post-tests.edit', compact('postTest'));
    }

    public function update(Request $request, PostTest $postTest)
    {
        $validated = $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_answer' => 'required|in:a,b,c,d'
        ]);

        $postTest->update($validated);
        return redirect()->route('admin.post-tests.index')
            ->with('success', 'Soal Post Test berhasil diperbarui');
    }

    public function destroy(PostTest $postTest)
    {
        $postTest->delete();
        return redirect()->route('admin.post-tests.index')
            ->with('success', 'Soal Post Test berhasil dihapus');
    }
}
