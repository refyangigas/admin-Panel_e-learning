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
