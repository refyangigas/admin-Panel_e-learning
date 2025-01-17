<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    public function index()
    {
        $references = Reference::all();
        return view('admin.references.index', compact('references'));
    }

    public function create()
    {
        return view('admin.references.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required'
        ]);

        Reference::create($validated);
        return redirect()->route('admin.references.index')
            ->with('success', 'Referensi berhasil ditambahkan');
    }

    public function edit(Reference $reference)
    {
        return view('admin.references.edit', compact('reference'));
    }

    public function update(Request $request, Reference $reference)
    {
        $validated = $request->validate([
            'content' => 'required'
        ]);

        $reference->update($validated);
        return redirect()->route('admin.references.index')
            ->with('success', 'Referensi berhasil diperbarui');
    }

    public function destroy(Reference $reference)
    {
        $reference->delete();
        return redirect()->route('admin.references.index')
            ->with('success', 'Referensi berhasil dihapus');
    }
}
