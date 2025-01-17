// resources/views/admin/user-guides/index.blade.php
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Petunjuk Pengguna</h5>
        <a href="{{ route('admin.user-guides.create') }}" class="btn btn-primary">Tambah Petunjuk</a>
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
                    <th width="75%">Konten</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userGuides as $guide)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $guide->content }}</td>
                    <td>
                        <a href="{{ route('admin.user-guides.edit', $guide->id) }}"
                           class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('admin.user-guides.destroy', $guide->id) }}"
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

// resources/views/admin/user-guides/create.blade.php
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

// resources/views/admin/user-guides/edit.blade.php
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Petunjuk Pengguna</h5>
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

        <form action="{{ route('admin.user-guides.update', $userGuide->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Konten Petunjuk</label>
                <textarea class="form-control" name="content" rows="5" required>{{ old('content', $userGuide->content) }}</textarea>
                <small class="text-muted">Masukkan petunjuk penggunaan aplikasi</small>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.user-guides.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
