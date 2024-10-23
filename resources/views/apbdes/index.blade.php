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
    <div class="container-fluid"> <!-- Membuat kontainer lebih responsif -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12"> <!-- Menambahkan kelas kolom untuk semua perangkat -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ __('APBDes') }}
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">{{ __('Daftar Anggaran APBDes ') . request()->tahun }}</h2>
                        <div class="text-center mb-3">
                            <a href="{{ route('apbdes.index') }}" class="btn btn-primary">Anggaran</a>
                            <a href="{{ route('apbdes.verifikasi') }}" class="btn btn-warning">Verifikasi</a>
                            <a href="{{ route('apbdes.realisasi') }}" class="btn btn-success">Realisasi</a>
                        </div>
                        <div class="mb-3 text-center">
                            <a href="{{ route('apbdes.create') }}" class="btn btn-success">Tambah Anggaran</a>
                        </div>

                        <!-- Tabel anggaran -->
                        <div class="table-responsive"> <!-- Membuat tabel responsif -->
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Tahun') }}</th>
                                        <th>{{ __('Nama Anggaran') }}</th>
                                        <th>{{ __('Nilai Anggaran') }}</th>
                                        <th>{{ __('Keterangan Lainnya') }}</th>
                                        <th>{{ __('Verifikasi') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Aksi') }}</th>
                                        <th>{{ __('Edit Nilai Anggaran') }}</th>
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
                                                <a href="{{ route('anggaran.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('anggaran.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus anggaran ini?')">Hapus</button>
                                                </form>
                                            </td>
                                            <td>
                                                <!-- Form untuk update nilai anggaran -->
                                                <form action="{{ route('anggaran.updateNilai', $item->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="input-group">
                                                        <input type="number" name="nilai_anggaran" required class="form-control" style="width: 120px;" value="{{ $item->nilai_anggaran }}">
                                                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                                                    </div>
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
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <style>
        table {
            font-family: Arial, sans-serif;
            font-size: 14px;
            width: 100%;
        }

        .table th, .table td {
            padding: 10px;
            white-space: normal;
            word-wrap: break-word;
            overflow: hidden;
        }

        /* Membatasi lebar kolom ID */
        .table td:nth-child(1), .table th:nth-child(1) {
            width: 50px; /* Tetapkan lebar tetap untuk kolom ID */
            max-width: 50px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .table td:nth-child(1), .table th:nth-child(1) {
                width: 30px; /* Lebar lebih kecil untuk perangkat mobile */
                max-width: 30px;
            }

            table {
                font-size: 12px;
            }

            .breadcrumb {
                font-size: 12px;
            }

            .btn {
                padding: 5px 10px;
            }

            .table th, .table td {
                font-size: 12px;
                white-space: normal;
                word-wrap: break-word;
            }

            .input-group input {
                width: 100%;
            }
        }

        @media (min-width: 992px) {
            .table th, .table td {
                font-size: 14px;
            }

            .input-group input {
                width: 120px;
            }
        }
    </style>

@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            responsive: true,
            paging: true,
            searching: true,
            ordering: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari di sini...",
                paginate: {
                    next: 'Selanjutnya',
                    previous: 'Sebelumnya'
                }
            },
        });
    });
</script>
@endpush

