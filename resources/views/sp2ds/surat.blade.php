@extends('layouts.admin')

@section('title', __('Surat'))

@section('content')
    <h2>Halaman Surat</h2>
    <p>Ini adalah halaman untuk mengelola Surat.</p>

    <div class="mb-3">
        <a href="{{ route('surat.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Tambah Surat
        </a>
    </div>

    <table class="table table-bordered" id="suratTable">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($surats as $surat)
                <tr>
                    <td>{{ $surat->judul }}</td>
                    <td>{{ $surat->tanggal }}</td>
                    <td>
                        <a href="{{ route('surat.show', $surat->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i> Lihat
                        </a>
                        <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    {{-- Hapus skrip DataTables jika tidak lagi digunakan --}}
@endpush
