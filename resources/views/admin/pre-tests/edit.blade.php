<!-- resources/views/admin/pre-tests/edit.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Edit Soal Pre Test</h5>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('admin.pre-tests.update', $preTest->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="question" class="form-label">Soal <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('question') is-invalid @enderror"
                              id="question"
                              name="question"
                              rows="3"
                              required>{{ old('question', $preTest->question) }}</textarea>
                    @error('question')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="option_a" class="form-label">Pilihan A <span class="text-danger">*</span></label>
                            <input type="text"
                                   class="form-control @error('option_a') is-invalid @enderror"
                                   id="option_a"
                                   name="option_a"
                                   value="{{ old('option_a', $preTest->option_a) }}"
                                   required>
                            @error('option_a')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="option_b" class="form-label">Pilihan B <span class="text-danger">*</span></label>
                            <input type="text"
                                   class="form-control @error('option_b') is-invalid @enderror"
                                   id="option_b"
                                   name="option_b"
                                   value="{{ old('option_b', $preTest->option_b) }}"
                                   required>
                            @error('option_b')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="option_c" class="form-label">Pilihan C <span class="text-danger">*</span></label>
                            <input type="text"
                                   class="form-control @error('option_c') is-invalid @enderror"
                                   id="option_c"
                                   name="option_c"
                                   value="{{ old('option_c', $preTest->option_c) }}"
                                   required>
                            @error('option_c')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="option_d" class="form-label">Pilihan D <span class="text-danger">*</span></label>
                            <input type="text"
                                   class="form-control @error('option_d') is-invalid @enderror"
                                   id="option_d"
                                   name="option_d"
                                   value="{{ old('option_d', $preTest->option_d) }}"
                                   required>
                            @error('option_d')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="correct_answer" class="form-label">Kunci Jawaban <span class="text-danger">*</span></label>
                    <select class="form-select @error('correct_answer') is-invalid @enderror"
                            id="correct_answer"
                            name="correct_answer"
                            required>
                        <option value="" disabled>Pilih kunci jawaban</option>
                        <option value="a" {{ old('correct_answer', $preTest->correct_answer) == 'a' ? 'selected' : '' }}>A</option>
                        <option value="b" {{ old('correct_answer', $preTest->correct_answer) == 'b' ? 'selected' : '' }}>B</option>
                        <option value="c" {{ old('correct_answer', $preTest->correct_answer) == 'c' ? 'selected' : '' }}>C</option>
                        <option value="d" {{ old('correct_answer', $preTest->correct_answer) == 'd' ? 'selected' : '' }}>D</option>
                    </select>
                    @error('correct_answer')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.pre-tests.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
