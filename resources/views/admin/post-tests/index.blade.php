<!-- resources/views/admin/post-tests/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Soal Post Test</h5>
        <a href="{{ route('admin.post-tests.create') }}" class="btn btn-primary">Tambah Soal</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="40%">Soal</th>
                    <th width="40%">Pilihan Jawaban</th>
                    <th width="5%">Kunci</th>
                    <th width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($postTests as $postTest)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $postTest->question }}</td>
                    <td>
                        <strong>A:</strong> {{ $postTest->option_a }}<br>
                        <strong>B:</strong> {{ $postTest->option_b }}<br>
                        <strong>C:</strong> {{ $postTest->option_c }}<br>
                        <strong>D:</strong> {{ $postTest->option_d }}
                    </td>
                    <td>{{ strtoupper($postTest->correct_answer) }}</td>
                    <td>
                        <a href="{{ route('admin.post-tests.edit', $postTest->id) }}"
                           class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('admin.post-tests.destroy', $postTest->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

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

<!-- resources/views/admin/post-tests/edit.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Soal Post Test</h5>
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

        <form action="{{ route('admin.post-tests.update', $postTest->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Soal</label>
                <textarea class="form-control" name="question" rows="3" required>{{ old('question', $postTest->question) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Pilihan A</label>
                <input type="text" class="form-control" name="option_a" required
                       value="{{ old('option_a', $postTest->option_a) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Pilihan B</label>
                <input type="text" class="form-control" name="option_b" required
                       value="{{ old('option_b', $postTest->option_b) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Pilihan C</label>
                <input type="text" class="form-control" name="option_c" required
                       value="{{ old('option_c', $postTest->option_c) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Pilihan D</label>
                <input type="text" class="form-control" name="option_d" required
                       value="{{ old('option_d', $postTest->option_d) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Kunci Jawaban</label>
                <select class="form-select" name="correct_answer" required>
                    <option value="a" {{ old('correct_answer', $postTest->correct_answer) == 'a' ? 'selected' : '' }}>A</option>
                    <option value="b" {{ old('correct_answer', $postTest->correct_answer) == 'b' ? 'selected' : '' }}>B</option>
                    <option value="c" {{ old('correct_answer', $postTest->correct_answer) == 'c' ? 'selected' : '' }}>C</option>
                    <option value="d" {{ old('correct_answer', $postTest->correct_answer) == 'd' ? 'selected' : '' }}>D</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.post-tests.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
