{{-- // resources/views/admin/references/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Tambah Referensi</h5>
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

        <form action="{{ route('admin.references.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Konten</label>
                <textarea class="form-control" name="content" rows="5" required>{{ old('content') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.references.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
