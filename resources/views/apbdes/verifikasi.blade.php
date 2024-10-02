@extends('layouts.admin')

@section('title', 'Verifikasi Anggaran')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">APBDes</li>
        <li class="breadcrumb-item active">Verifikasi</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Daftar Anggaran untuk Verifikasi</h2>
                    <div class="text-center mb-5">
                        <a href="{{ route('apbdes.index') }}" class="btn btn-primary">Anggaran</a>
                        <a href="{{ route('apbdes.verifikasi') }}" class="btn btn-warning">Verifikasi</a>
                        <a href="{{ route('apbdes.realisasi') }}" class="btn btn-success">Realisasi</a>
                    </div>

                    <!-- Tabel Verifikasi Anggaran -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('No Rekening') }}</th>
                                    <th>{{ __('Nama Rekening') }}</th>
                                    <th>{{ __('Keterangan Lainnya') }}</th>
                                    <th>{{ __('Nilai Anggaran') }}</th>
                                    <th>{{ __('Verifikasi') }}</th>
                                    <th>{{ __('Aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggaran as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->detail_norekening_id }}</td>
                                        <td>{{ $item->detail_norekening->nama }}</td>
                                        <td>{{ $item->keterangan_lainnya }}</td>
                                        <td>{{ number_format($item->nilai_anggaran, 2, ',', '.') }}</td>
                                        <td>
                                            @if($item->verifikasi)
                                                <span class="badge bg-success">Terverifikasi</span>
                                            @else
                                                <span class="badge bg-warning">Belum Terverifikasi</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Tombol Verifikasi / Batalkan Verifikasi -->
                                            <form action="{{ route('verifikasi.toggle', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    {{ $item->verifikasi ? 'Batalkan Verifikasi' : 'Verifikasi' }}
                                                </button>
                                            </form>

                                            <!-- Tombol Realisasi (jika belum terealisasi) -->
                                            @if($item->status === 'belum_realisasi')
                                                <form action="{{ route('status.toggle', $item->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-info btn-sm">Realisasi</button>
                                                </form>
                                            @elseif($item->status === 'realisasi')
                                                <span class="badge bg-success">Realisasi</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginasi -->
                    <div class="mt-3">
                        {{ $anggaran->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .table {
            font-size: 14px;
        }
        .table th, .table td {
            padding: 12px;
            text-align: center;
        }
    </style>
@endpush

@push('scripts')
    {{-- Script tambahan jika diperlukan --}}
@endpush
