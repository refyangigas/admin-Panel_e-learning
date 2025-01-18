{{-- // resources/views/admin/user-guides/edit.blade.php --}}
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
