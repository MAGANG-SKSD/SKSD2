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
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Daftar Anggaran untuk Verifikasi</h2>
                        
                        <!-- Tombol Navigasi Anggaran, Verifikasi, Realisasi -->
                        <div class="d-flex justify-content-center mb-4 flex-wrap">
                            <a href="{{ route('apbdes.index') }}" class="btn btn-primary mx-2 my-2 btn-sm">Anggaran</a>
                            <a href="{{ route('apbdes.verifikasi') }}" class="btn btn-warning mx-2 my-2 btn-sm">Verifikasi</a>
                            <a href="{{ route('apbdes.realisasi') }}" class="btn btn-success mx-2 my-2 btn-sm">Realisasi</a>
                        </div>

                        <!-- Tabel Verifikasi Anggaran -->
                        <div class="table-responsive-sm">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('No Rekening') }}</th>
                                        <th>{{ __('Nama Anggaran') }}</th>
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
                                            <td class="d-flex justify-content-center flex-wrap">
                                                <!-- Tombol Verifikasi / Batalkan Verifikasi -->
                                                <form action="{{ route('verifikasi.toggle', $item->id) }}" method="POST" class="mx-1 my-1">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm btn-block">
                                                        {{ $item->verifikasi ? 'Batalkan Verifikasi' : 'Verifikasi' }}
                                                    </button>
                                                </form>

                                                <!-- Tombol Realisasi (jika belum terealisasi) -->
                                                @if($item->status === 'belum_realisasi')
                                                    <form action="{{ route('status.toggle', $item->id) }}" method="POST" class="mx-1 my-1">
                                                        @csrf
                                                        <button type="submit" class="btn btn-info btn-sm btn-block">Realisasi</button>
                                                    </form>
                                                @elseif($item->status === 'realisasi')
                                                    <span class="badge bg-success my-1">Realisasi</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Paginasi -->
                        <div class="mt-3 d-flex justify-content-center">
                            {{ $anggaran->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        /* Untuk memperbaiki tampilan font dan padding di layar kecil */
        .table {
            font-size: 14px;
        }
        .table th, .table td {
            padding: 12px;
            text-align: center;
        }
        /* Menambahkan scroll horizontal jika tabel terlalu lebar di layar kecil */
        .table-responsive-sm {
            overflow-x: auto;
        }

        /* Untuk tampilan lebih kecil, kita atur padding dan font lebih kecil */
        @media (max-width: 768px) {
            .table th, .table td {
                padding: 8px;
                font-size: 12px;
            }
            /* Membuat tombol full width di layar kecil */
            .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
@endpush

@push('scripts')
    {{-- Script tambahan jika diperlukan --}}
@endpush
