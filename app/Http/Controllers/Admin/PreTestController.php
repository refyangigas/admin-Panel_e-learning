<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PreTest;
use Illuminate\Http\Request;

class PreTestController extends Controller
{
    public function index()
    {
        $preTests = PreTest::all();
        return view('admin.pre-tests.index', compact('preTests'));
    }

    public function create()
    {
        return view('admin.pre-tests.create');
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

        PreTest::create($validated);
        return redirect()->route('admin.pre-tests.index')
            ->with('success', 'Soal Pre Test berhasil ditambahkan');
    }

    public function edit(PreTest $preTest)
    {
        return view('admin.pre-tests.edit', compact('preTest'));
    }

    public function update(Request $request, PreTest $preTest)
    {
        $validated = $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_answer' => 'required|in:a,b,c,d'
        ]);

        $preTest->update($validated);
        return redirect()->route('admin.pre-tests.index')
            ->with('success', 'Soal Pre Test berhasil diperbarui');
    }

    public function destroy(PreTest $preTest)
    {
        $preTest->delete();
        return redirect()->route('admin.pre-tests.index')
            ->with('success', 'Soal Pre Test berhasil dihapus');
    }
}
