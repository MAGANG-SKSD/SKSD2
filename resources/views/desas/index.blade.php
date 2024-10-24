@extends('layouts.admin')
@section('title', __('Desa'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('Desa') }}</li>
    </ul>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Tombol Kembali ke Profil Desa -->
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{ route('desas.profile', ['desa_id' => auth()->user()->desa->desa_id]) }}" class="btn btn-primary btn-block btn-sm">Kembali ke Profil Desa</a>
            </div>
        </div>

        <!-- Card untuk Tabel -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive py-5 pb-4 dropdown_2">
                            <div class="container-fluid">
                                {{ $dataTable->table(['width' => '100%']) }}
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
