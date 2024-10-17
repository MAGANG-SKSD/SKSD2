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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Daftar Anggaran untuk Realisasi</h2>
                    <div class="text-center mb-5">
                        <a href="{{ route('apbdes.index') }}" class="btn btn-primary">Anggaran</a>
                        <a href="{{ route('apbdes.verifikasi') }}" class="btn btn-warning">Verifikasi</a>
                        <a href="{{ route('apbdes.realisasi') }}" class="btn btn-success">Realisasi</a>
                    </div>
                    <div class="mb-5">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead>
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
                                            <td>
                                                <form action="{{ route('status.toggle', $item->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-info btn-sm">
                                                        {{ $item->status ? 'Batalkan Realisasi' : 'Realisasikan' }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('anggaran.realisasi.update', $item->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="input-group">
                                                        <input type="number" name="nilai_realisasi" required class="form-control" style="width: 100px;">
                                                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
    <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
@endpush

@push('scripts')
    {{-- Script tambahan jika diperlukan --}}
@endpush
