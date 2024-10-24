@extends('layouts.admin')

@section('title', 'Realisasi Anggaran')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">APBDes</li>
        <li class="breadcrumb-item active">Realisasi</li>
    </ul>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Daftar Anggaran untuk Realisasi</h2>
                        
                        <!-- Tombol Navigasi Anggaran, Verifikasi, Realisasi -->
                        <div class="d-flex justify-content-center mb-4 flex-wrap">
                            <a href="{{ route('apbdes.index') }}" class="btn btn-primary mx-2 my-2 btn-sm">Anggaran</a>
                            <a href="{{ route('apbdes.verifikasi') }}" class="btn btn-warning mx-2 my-2 btn-sm">Verifikasi</a>
                            <a href="{{ route('apbdes.realisasi') }}" class="btn btn-success mx-2 my-2 btn-sm">Realisasi</a>
                        </div>

                        <!-- Tabel Realisasi Anggaran -->
                        <div class="table-responsive-sm">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Nama Anggaran') }}</th>
                                        <th>{{ __('Anggaran') }}</th>
                                        <th>{{ __('Realisasi') }}</th>
                                        <th>{{ __('Anggaran Tidak Terpakai') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Aksi') }}</th>
                                        <th>{{ __('Update Realisasi') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anggaran as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->detail_norekening->nama }}</td>
                                            <td>{{ number_format($item->nilai_anggaran, 2, ',', '.') }}</td>
                                            <td>{{ number_format($item->nilai_realisasi, 2, ',', '.') }}</td>
                                            <td>{{ number_format($item->nilai_anggaran - $item->nilai_realisasi, 2, ',', '.') }}</td>
                                            <td>
                                                @if($item->status)
                                                    <span class="badge bg-success">TerRealisasi</span>
                                                @else
                                                    <span class="badge bg-warning">Belum TerRealisasi</span>
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-center flex-wrap">
                                                <!-- Tombol Realisasi -->
                                                <form action="{{ route('status.toggle', $item->id) }}" method="POST" class="mx-1 my-1">
                                                    @csrf
                                                    <button type="submit" class="btn btn-info btn-sm btn-block">
                                                        {{ $item->status ? 'Batalkan Realisasi' : 'Realisasikan' }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <!-- Form Update Realisasi -->
                                                <form action="{{ route('anggaran.realisasi.update', $item->id) }}" method="POST" class="mx-1 my-1">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="input-group justify-content-center">
                                                        <input type="number" name="nilai_realisasi" required class="form-control" style="max-width: 100px;">
                                                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                                                    </div>
                                                </form>
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
        /* Tabel lebih responsif dengan horizontal scroll */
        .table-responsive-sm {
            overflow-x: auto;
        }

        /* Memperbaiki tampilan font dan padding di layar kecil */
        .table {
            font-size: 14px;
        }
        .table th, .table td {
            padding: 12px;
            text-align: center;
        }

        /* Untuk layar kecil, atur padding dan font lebih kecil */
        @media (max-width: 768px) {
            .table th, .table td {
                padding: 8px;
                font-size: 12px;
            }
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
