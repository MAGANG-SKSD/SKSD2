@extends('layouts.admin')

@section('title', __('Surat'))

@section('content')
    <h2>Halaman Surat</h2>
    <p>Ini adalah halaman untuk mengelola Surat.</p>

    <div class="mb-3">
        <a href="{{ route('surat.print') }}" class="btn btn-secondary">
            <i class="fa fa-print"></i> Cetak Surat
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
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    {{-- Tambahkan skrip DataTables jika dibutuhkan --}}
@endpush
