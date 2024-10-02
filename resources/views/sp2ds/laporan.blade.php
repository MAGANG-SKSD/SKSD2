@extends('layouts.admin')

@section('title', __('Laporan'))

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Laporan') }}</li>
    </ul>
@endsection

@section('content')
    <h2>Halaman Laporan</h2>
    <p>Ini adalah halaman untuk mengelola Laporan.</p>
    
    <div class="mb-3">
        <a href="{{ route('laporan.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Tambah Laporan
        </a>
    </div>

    <table class="table table-bordered" id="laporanTable">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $laporan)
                <tr>
                    <td>{{ $laporan->judul }}</td>
                    <td>{{ $laporan->tanggal }}</td>
                    <td>
                        <a href="{{ route('laporan.show', $laporan->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i> Lihat
                        </a>
                        <a href="{{ route('laporan.edit', $laporan->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">
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
    <script>
        $(document).ready(function() {
            $('#laporanTable').DataTable(); // Inisialisasi DataTable jika menggunakan plugin
        });
    </script>
@endpush
