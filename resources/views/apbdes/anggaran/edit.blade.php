@extends('layouts.admin')
@section('title', __('Edit Anggaran'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('anggaran.index') }}">{{ __('Daftar Anggaran') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit Anggaran') }}</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2>{{ __('Edit Anggaran') }}</h2>
                    @include('layouts.components.alert')

                    <form action="{{ route('anggaran.update', $anggaran->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="tahun">{{ __('Tahun') }}</label>
                            <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $anggaran->tahun }}" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_norekening">{{ __('Jenis Anggaran') }}</label>
                            <select name="jenis_norekening" id="jenis_norekening" class="form-control" required>
                                <option value="4" {{ $anggaran->jenis_norekening == 4 ? 'selected' : '' }}>Pendapatan</option>
                                <option value="5" {{ $anggaran->jenis_norekening == 5 ? 'selected' : '' }}>Belanja</option>
                                <option value="6" {{ $anggaran->jenis_norekening == 6 ? 'selected' : '' }}>Pembiayaan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="detail_norekening_id">{{ __('Detail Rekening') }}</label>
                            <select name="detail_norekening_id" id="detail_norekening_id" class="form-control" required>
                                <!-- Add options here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nilai_anggaran">{{ __('Nilai Anggaran') }}</label>
                            <input type="number" class="form-control" id="nilai_anggaran" name="nilai_anggaran" value="{{ $anggaran->nilai_anggaran }}" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan_lainnya">{{ __('Keterangan Lainnya') }}</label>
                            <textarea class="form-control" id="keterangan_lainnya" name="keterangan_lainnya">{{ $anggaran->keterangan_lainnya }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">{{ __('Simpan') }}</button>
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
