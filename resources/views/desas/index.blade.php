@extends('layouts.admin')
@section('title', __('Desa'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('Desa') }}</li>
    </ul>
@endsection

@section('content')
    {{-- @include('partial.nav-builder', ['desas' => $desas]) --}}
    <div class="row">
        <div class="col-lg-12 mb-3"> <!-- Tambahkan margin bawah -->
            <a href="{{ route('desas.profile', ['desa_id' => 1]) }}" class="btn btn-primary">Kembali ke Profil Desa</a> <!-- Ganti 1 dengan ID desa yang sesuai -->
        </div>
        <div class="col-lg-12">
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
@endsection

@push('style')
    @include('layouts.includes.datatable_css')
@endpush

@push('scripts')
    @include('layouts.includes.datatable_js')
    {{ $dataTable->scripts() }}
@endpush
