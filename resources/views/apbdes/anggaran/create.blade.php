@extends('layouts.admin')
@section('title', __('Tambah Anggaran'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('anggaran.index') }}">{{ __('Daftar Anggaran') }}</a></li>
        <li class="breadcrumb-item">{{ __('Tambah Anggaran') }}</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2>{{ __('Tambah Anggaran') }}</h2>

                    @include('layouts.components.alert') {{-- Menampilkan alert jika ada --}}

                    <form action="{{ route('anggaran.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tahun">{{ __('Tahun') }}</label>
                            <input type="number" name="tahun" id="tahun" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="jenis_norekening">{{ __('Jenis Anggaran') }}</label>
                            <select name="jenis_norekening" id="jenis_norekening" class="form-control" required>
                                <option value="" disabled selected>{{ __('Pilih Jenis Anggaran') }}</option>
                                <option value="4">{{ __('Pendapatan') }}</option>
                                <option value="5">{{ __('Belanja') }}</option>
                                <option value="6">{{ __('Pembiayaan') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="detail_norekening_id">{{ __('Detail Anggaran') }}</label>
                            <select name="detail_norekening_id" id="detail_norekening_id" class="form-control" required>
                                <option value="" disabled selected>{{ __('Pilih Detail Anggaran') }}</option>
                                @foreach ($jenis_norekening as $norekening)
                                    <option value="{{ $norekening->id }}">{{ $norekening->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nilai_anggaran">{{ __('Nilai Anggaran') }}</label>
                            <input type="number" name="nilai_anggaran" id="nilai_anggaran" class="form-control" required min="0 step="0.01">
                        </div>

                        <div class="form-group">
                            <label for="keterangan_lainnya">{{ __('Keterangan Lainnya') }}</label>
                            <textarea name="keterangan_lainnya" id="keterangan_lainnya" class="form-control" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                        <a href="{{ route('anggaran.index') }}" class="btn btn-secondary">{{ __('Kembali') }}</a>
                    </form>
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
