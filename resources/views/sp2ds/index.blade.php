@extends('layouts.admin')

@section('title', __('Kelola Surat'))

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('Kelola Surat') }}</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    {{ __('SP2D') }}
                </div>
                <div class="card-body">
                    <h2 class="text-center">{{ __('Daftar Kelola Surat ') . request()->tahun }}</h2>
                    <div class="text-center">
                    <div class="text-center">
    <div class="mb-3">
        <a href="{{ route('sp2d.index') }}" class="btn btn-outline-primary btn-lg m-2">
            <i class="fa fa-file-alt"></i> SP2D
        </a>
        <a href="{{ route('berita_acara.index') }}" class="btn btn-outline-success btn-lg m-2">
            <i class="fa fa-clipboard-list"></i> Berita Acara
        </a>
        <a href="{{ route('berita_desa.index') }}" class="btn btn-outline-warning btn-lg m-2">
            <i class="fa fa-newspaper"></i> Berita Desa
        </a>
        <a href="{{ route('laporan.index') }}" class="btn btn-outline-info btn-lg m-2">
            <i class="fa fa-chart-line"></i> Laporan
        </a>
        <a href="{{ route('lembaran_desa.index') }}" class="btn btn-outline-dark btn-lg m-2">
            <i class="fa fa-book"></i> Lembaran Desa
        </a>
        <a href="{{ route('notulen.index') }}" class="btn btn-outline-danger btn-lg m-2">
            <i class="fa fa-file-signature"></i> Notulen
        </a>
        <a href="{{ route('rekomendasi.index') }}" class="btn btn-outline-secondary btn-lg m-2">
            <i class="fa fa-lightbulb"></i> Rekomendasi
        </a>
        <a href="{{ route('surat_pengantar.index') }}" class="btn btn-outline-primary btn-lg m-2">
            <i class="fa fa-envelope"></i> Surat Pengantar
        </a>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    @include('layouts.includes.datatable_css')
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
@endpush

@push('scripts')
    @include('layouts.includes.datatable_js')
    {{ $dataTable->scripts() }}
@endpush
