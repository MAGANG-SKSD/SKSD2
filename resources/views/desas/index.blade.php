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
                <a href="{{ route('desas.profile', ['desa_id' => 1]) }}" class="btn btn-primary btn-block btn-sm">Kembali ke Profil Desa</a>
            </div>
        </div>

        <!-- Card untuk Tabel -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Menambahkan Class 'table-responsive' untuk Tabel agar responsif -->
                        <div class="table-responsive py-5 pb-4">
                            {{ $dataTable->table(['class' => 'table table-striped table-bordered', 'width' => '100%']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    @include('layouts.includes.datatable_css')
@endpush

@push('scripts')
    @include('layouts.includes.datatable_js')
    {{ $dataTable->scripts() }}
@endpush
