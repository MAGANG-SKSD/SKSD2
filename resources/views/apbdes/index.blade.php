@extends('layouts.admin')
@section('title', __('APBDes'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('APBDes') }}</li>
    </ul>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h2>{{ __('APBDes Actions') }}</h2>
                        <div class="mb-3">
                            <a href="{{ route('apbdes.index') }}" class="btn btn-primary">Anggaran</a>
                            <a href="{{ route('apbdes.verifikasi') }}" class="btn btn-warning">Verifikasi</a>
                            <a href="{{ route('realisasi_anggarans.index') }}" class="btn btn-success">Realisasi</a>
                        </div>
                    </div>

                    <h3 class="mt-4">{{ __('Daftar Anggaran') }}</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('Nama Anggaran') }}</th>
                                <th>{{ __('Jumlah') }}</th>
                                <th>{{ __('Aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggarans as $anggaran)
                                <tr>
                                    <td>{{ $anggaran->nama }}</td>
                                    <td>{{ number_format($anggaran->jumlah, 2, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('apbdes.anggaran.edit', $anggaran) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('apbdes.anggaran.destroy', $anggaran) }}" method="POST" style="display:inline;">
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
                        <a href="{{ route('apbdes.anggaran.create') }}" class="btn btn-success">Tambah Anggaran</a>
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
    {{-- Tidak perlu scripts DataTable --}}
@endpush
