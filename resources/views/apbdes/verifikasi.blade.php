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
                    <div class="text-center">
                        <div class="mb-3">
                            <a href="{{ route('apbdes.index') }}" class="btn btn-primary">Anggaran</a>
                            <a href="{{ route('apbdes.verifikasi') }}" class="btn btn-warning">Verifikasi</a>
                            <a href="{{ route('realisasi_anggarans.index') }}" class="btn btn-success">Realisasi</a>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('No Rekening') }}</th> <!-- Kolom No Rekening -->
                                <th>{{ __('Jenis Rekening') }}</th>
                                <th>{{ __('Kelompok Rekening') }}</th>
                                <th>{{ __('Nama Rekening') }}</th>
                                <th>{{ __('Nilai Anggaran') }}</th>
                                <th>{{ __('Verifikasi') }}</th>
                                <th>{{ __('Aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggaran as $item)
                                <tr>
                                    <td>{{ $item->detail_norekening_id }}</td> <!-- Menampilkan ID detail_norekening -->
                                    <td>{{ $item->detail_norekening->jenis_norekening->nama }}</td>
                                    <td>{{ $item->detail_norekening->kelompok_norekening->nama }}</td>
                                    <td>{{ $item->detail_norekening->nama }}</td>
                                    <td>{{ number_format($item->nilai_anggaran, 2, ',', '.') }}</td>
                                    <td>
                                        @if($item->verifikasi)
                                            <span class="badge bg-success">Terverifikasi</span>
                                        @else
                                            <span class="badge bg-warning">Belum Terverifikasi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('verifikasi.toggle', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">
                                                {{ $item->verifikasi ? 'Batalkan Verifikasi' : 'Verifikasi' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $anggaran->links() }} <!-- Untuk paginasi -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
