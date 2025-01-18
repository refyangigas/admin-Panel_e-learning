<!-- resources/views/admin/post-tests/create.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Tambah Soal Post Test</h5>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.post-tests.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Soal</label>
                <textarea class="form-control" name="question" rows="3" required>{{ old('question') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Pilihan A</label>
                <input type="text" class="form-control" name="option_a" required value="{{ old('option_a') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Pilihan B</label>
                <input type="text" class="form-control" name="option_b" required value="{{ old('option_b') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Pilihan C</label>
                <input type="text" class="form-control" name="option_c" required value="{{ old('option_c') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Pilihan D</label>
                <input type="text" class="form-control" name="option_d" required value="{{ old('option_d') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Kunci Jawaban</label>
                <select class="form-select" name="correct_answer" required>
                    <option value="">Pilih Jawaban</option>
                    <option value="a" {{ old('correct_answer') == 'a' ? 'selected' : '' }}>A</option>
                    <option value="b" {{ old('correct_answer') == 'b' ? 'selected' : '' }}>B</option>
                    <option value="c" {{ old('correct_answer') == 'c' ? 'selected' : '' }}>C</option>
                    <option value="d" {{ old('correct_answer') == 'd' ? 'selected' : '' }}>D</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.post-tests.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
