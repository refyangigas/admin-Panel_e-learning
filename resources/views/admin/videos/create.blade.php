{{-- resources/views/admin/videos/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Tambah Video</h5>
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

        <form action="{{ route('admin.videos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Judul Video</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">URL Video</label>
                <input type="url" class="form-control" name="youtube_url" value="{{ old('youtube_url') }}" required>
                <small class="text-muted">Masukkan URL video YouTube</small>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
