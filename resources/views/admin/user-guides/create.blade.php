{{-- // resources/views/admin/user-guides/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Tambah Petunjuk Pengguna</h5>
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

        <form action="{{ route('admin.user-guides.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Konten Petunjuk</label>
                <textarea class="form-control" name="content" rows="5" required>{{ old('content') }}</textarea>
                <small class="text-muted">Masukkan petunjuk penggunaan aplikasi</small>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.user-guides.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
