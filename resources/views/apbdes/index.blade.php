@extends('layouts.admin')

@section('title', 'APBDes Anggaran')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">APBDes</li>
        <li class="breadcrumb-item active">Anggaran</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">{{ __('Daftar Anggaran APBDes Tahun ') . ($tahun_dipilih === 'semua' ? 'Semua' : $tahun_dipilih) }}</h2>
                    <div class="text-center mb-5">
                        <a href="{{ route('apbdes.index') }}" class="btn btn-primary">Anggaran</a>
                        <a href="{{ route('apbdes.verifikasi') }}" class="btn btn-warning">Verifikasi</a>
                        <a href="{{ route('apbdes.realisasi') }}" class="btn btn-success">Realisasi</a>
                    </div>
                    <div class="d-flex justify-content-between mb-5">
                        <a href="{{ route('apbdes.create') }}" class="btn btn-success">Tambah Anggaran</a>

                        <!-- Dropdown untuk memilih tahun -->
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownTahun" data-bs-toggle="dropdown" aria-expanded="false">
                                Pilih Tahun
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownTahun">
                                <li><a class="dropdown-item" href="{{ route('apbdes.index', ['tahun' => 'semua']) }}">Tampilkan Semua</a></li>
                                @foreach ($tahun_anggaran as $tahun)
                                    <li><a class="dropdown-item" href="{{ route('apbdes.index', ['tahun' => $tahun]) }}">{{ $tahun }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Tabel anggaran -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Tahun') }}</th>
                                    <th>{{ __('Nama Rekening') }}</th>
                                    <th>{{ __('Nilai Anggaran') }}</th>
                                    <th>{{ __('Keterangan Lainnya') }}</th>
                                    <th>{{ __('Verifikasi') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggaran as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>{{ $item->detail_norekening->nama }}</td>
                                        <td>{{ number_format($item->nilai_anggaran, 2, ',', '.') }}</td>
                                        <td>{{ $item->keterangan_lainnya }}</td>
                                        <td>
                                            @if($item->verifikasi)
                                                <span class="badge bg-success">Terverifikasi</span>
                                            @else
                                                <span class="badge bg-warning">Belum Terverifikasi</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->status)
                                                <span class="badge bg-success">Terealisasi</span>
                                            @else
                                                <span class="badge bg-warning">Belum Terealisasi</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('apbdes.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('anggaran.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus anggaran ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $anggaran->links() }} <!-- Untuk paginasi -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <style>
        table {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .table th, .table td {
            padding: 10px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .mb-5 {
            margin-bottom: 60px;
        }
    </style>
@endpush

@push('scripts')
    {{-- Script tambahan jika diperlukan --}}
@endpush
