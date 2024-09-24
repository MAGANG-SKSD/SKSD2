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
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> {{ __('APBDes') }}
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h2>{{ __('APBDes Actions') }}</h2>
                        <div class="mb-3">
                            <a href="{{ route('apbdes.anggaran.index') }}" class="btn btn-primary">Anggaran</a>
                            <a href="{{ route('apbdes.verifikasi') }}" class="btn btn-warning">Verifikasi</a>
                            <a href="{{ route('realisasi_anggarans.index') }}" class="btn btn-success">Realisasi</a>
                        </div>
                    </div>
                    {{-- <div class="text-center">
                        <h2>{{ __('APBDes Actions') }}</h2>
                        <div class="mb-3">
                            <div class="dash-item">
                                <a class="dash-link" href="{{ route('apbdes.anggaran') }}">
                                    <span class="dash-micon"><i class="ti ti-budget"></i></span>
                                    <span class="dash-mtext custom-weight">{{ __('Anggaran') }}</span>
                                </a>
                            </div>
                            <div class="dash-item">
                                <a class="dash-link" href="{{ route('apbdes.verifikasi') }}">
                                    <span class="dash-micon"><i class="ti ti-check"></i></span>
                                    <span class="dash-mtext custom-weight">{{ __('Verifikasi') }}</span>
                                </a>
                            </div>
                            @can('manage-reaalisasianggaran')
                                <li class="dash-item dash-hasmenu {{ request()->is('realisasi_anggarans*') ? 'active' : '' }}">
                                    <a class="dash-link" href="{{ route('realisasi_anggarans.index') }}">
                                        <span class="dash-micon"><i class="ti ti-search"></i></span>
                                        <span class="dash-mtext custom-weight">{{ __('Realisasi Anggaran') }}</span>
                                    </a>
                                </li>
                            @endcan
                        </div>
                    </div> --}}
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
