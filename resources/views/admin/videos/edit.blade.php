{{-- resources/views/admin/videos/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Video</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.videos.update', $video->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Judul Video</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $video->title) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">URL Video</label>
                    <input type="url" class="form-control" name="youtube_url" value="{{ old('youtube_url', $video->youtube_url) }}"
                        required>
                    <small class="text-muted">Masukkan URL video YouTube</small>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
