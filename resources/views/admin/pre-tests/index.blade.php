<!-- resources/views/admin/pre-tests/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Soal Pre Test</h5>
        <a href="{{ route('admin.pre-tests.create') }}" class="btn btn-primary">Tambah Soal</a>
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
                @foreach($preTests as $preTest)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $preTest->question }}</td>
                    <td>
                        <strong>A:</strong> {{ $preTest->option_a }}<br>
                        <strong>B:</strong> {{ $preTest->option_b }}<br>
                        <strong>C:</strong> {{ $preTest->option_c }}<br>
                        <strong>D:</strong> {{ $preTest->option_d }}
                    </td>
                    <td>{{ strtoupper($preTest->correct_answer) }}</td>
                    <td>
                        <a href="{{ route('admin.pre-tests.edit', $preTest->id) }}"
                           class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('admin.pre-tests.destroy', $preTest->id) }}"
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
