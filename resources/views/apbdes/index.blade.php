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
                            <a href="{{ route('apbdes.anggaran.index') }}" class="btn btn-primary">Anggaran</a>
                            <a href="{{ route('apbdes.verifikasi') }}" class="btn btn-warning">Verifikasi</a>
                            <a href="{{ route('apbdes.realisasi') }}" class="btn btn-success">Realisasi</a>
                        </div>
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
