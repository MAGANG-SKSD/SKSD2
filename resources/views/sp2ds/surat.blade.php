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
                <th>ID Anggaran</th>
                <th>Tahun Anggaran</th>
                <th>Nama Anggaran</th>
                <th>Nilai Anggaran</th>
                <th>Keterangan Lainnya</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anggaran as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>{{ $item->detail_norekening->nama }}</td>
                    <td>{{ number_format($item->nilai_anggaran, 2, ',', '.') }}</td>
                    <td>{{ $item->keterangan_lainnya }}</td>
                    <td>
                        <a href="{{ route('surat.show', $item->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i> Lihat
                        </a>
                        <a href="{{ route('surat.edit', $item->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('surat.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus anggaran ini?')">
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
    {{-- Tambahkan skrip DataTables jika dibutuhkan --}}
@endpush
