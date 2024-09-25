@extends('layouts.admin')
@section('title', __('Daftar Anggaran'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('apbdes.index') }}">{{ __('APBDes') }}</a></li>
        <li class="breadcrumb-item">{{ __('Daftar Anggaran') }}</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h2>{{ __('Daftar Anggaran') }}</h2>
                        <div class="mb-3">
                            <a href="{{ route('anggaran.create') }}" class="btn btn-primary">Tambah Anggaran</a>
                        </div>
                    </div>

                    @include('layouts.components.alert') {{-- Menampilkan alert jika ada --}}

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Jenis Anggaran</th>
                                    <th>Nilai Anggaran</th>
                                    <th>Nilai Realisasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anggarans as $key => $anggaran)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $anggaran->tahun }}</td>
                                        <td>{{ $anggaran->jenis_anggaran }}</td>
                                        <td>{{ number_format($anggaran->nilai_anggaran, 2) }}</td>
                                        <td>{{ number_format($anggaran->nilai_realisasi, 2) }}</td>
                                        <td>
                                            <a href="{{ route('anggaran.edit', $anggaran->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('anggaran.destroy', $anggaran->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    {{-- Tambahkan scripts jika diperlukan --}}
@endpush
