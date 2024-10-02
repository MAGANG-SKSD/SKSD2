@extends('layouts.admin')
@section('title', __('Detail Anggaran'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('anggaran.index') }}">{{ __('Daftar Anggaran') }}</a></li>
        <li class="breadcrumb-item">{{ __('Detail Anggaran') }}</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2>{{ __('Detail Anggaran') }}</h2>
                    @include('layouts.components.alert')

                    <ul class="list-group">
                        <li class="list-group-item"><strong>{{ __('Tahun') }}:</strong> {{ $anggaran->tahun }}</li>
                        <li class="list-group-item"><strong>{{ __('Jenis Anggaran') }}:</strong> {{ $anggaran->jenis_anggaran }}</li>
                        <li class="list-group-item"><strong>{{ __('Nilai Anggaran') }}:</strong> {{ number_format($anggaran->nilai_anggaran, 2) }}</li>
                        <li class="list-group-item"><strong>{{ __('Nilai Realisasi') }}:</strong> {{ number_format($anggaran->nilai_realisasi, 2) }}</li>
                        <li class="list-group-item"><strong>{{ __('Keterangan Lainnya') }}:</strong> {{ $anggaran->keterangan_lainnya }}</li>
                    </ul>

                    <a href="{{ route('anggaran.index') }}" class="btn btn-secondary mt-3">{{ __('Kembali') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
@endpush
