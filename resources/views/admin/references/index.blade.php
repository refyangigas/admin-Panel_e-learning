{{-- // resources/views/admin/references/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Pustaka</h5>
        <a href="{{ route('admin.references.create') }}" class="btn btn-primary">Tambah Referensi</a>
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
                @foreach($references as $reference)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reference->content }}</td>
                    <td>
                        <a href="{{ route('admin.references.edit', $reference->id) }}"
                           class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('admin.references.destroy', $reference->id) }}"
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
