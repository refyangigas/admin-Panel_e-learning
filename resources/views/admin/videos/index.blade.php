@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Video</h5>
        <a href="{{ route('admin.videos.create') }}" class="btn btn-primary">Tambah Video</a>
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
                    <th width="30%">Judul</th>
                    <th width="45%">URL</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($videos as $video)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $video->judul }}</td>
                    <td>{{ $video->url }}</td>
                    <td>
                        <a href="{{ route('admin.videos.edit', $video->id) }}"
                           class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('admin.videos.destroy', $video->id) }}"
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

// resources/views/admin/videos/create.blade.php
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
                <input type="text" class="form-control" name="judul" value="{{ old('judul') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">URL Video</label>
                <input type="url" class="form-control" name="url" value="{{ old('url') }}" required>
                <small class="text-muted">Masukkan URL video YouTube</small>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection

// resources/views/admin/videos/edit.blade.php
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Video</h5>
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

        <form action="{{ route('admin.videos.update', $video->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul Video</label>
                <input type="text" class="form-control" name="judul"
                       value="{{ old('judul', $video->judul) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">URL Video</label>
                <input type="url" class="form-control" name="url"
                       value="{{ old('url', $video->url) }}" required>
                <small class="text-muted">Masukkan URL video YouTube</small>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
