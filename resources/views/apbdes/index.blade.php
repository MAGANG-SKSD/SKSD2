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
                    <h2 class="text-center">{{ __('Daftar Anggaran APBDes ') . request()->tahun }}</h2>
                    <div class="text-center">
                        <div class="mb-3">
                            <a href="{{ route('apbdes.index') }}" class="btn btn-primary">Anggaran</a>
                            <a href="{{ route('apbdes.verifikasi') }}" class="btn btn-warning">Verifikasi</a>
                            <a href="{{ route('apbdes.realisasi') }}" class="btn btn-success">Realisasi</a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('apbdes.create') }}" class="btn btn-success">Tambah Anggaran</a>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Jenis Rekening') }}</th>
                                <th>{{ __('Kelompok Rekening') }}</th>
                                <th>{{ __('Nama Rekening') }}</th>
                                <th>{{ __('Nilai Anggaran') }}</th>
                                <th>{{ __('Verifikasi') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggaran as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
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
                                        @if($item->status)
                                            <span class="badge bg-success">TerRealisasi</span>
                                        @else
                                            <span class="badge bg-warning">Belum TerRealisasi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('apbdes.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('anggaran.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus anggaran ini?')">Hapus</button>
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

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
@endpush

@push('scripts')
    {{-- Script tambahan jika diperlukan --}}
@endpush
