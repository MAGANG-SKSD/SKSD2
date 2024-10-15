@extends('layouts.admin')
@section('title', __('No Rekening'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('No Rekening') }}</li>
    </ul>
@endsection

@section('content')
    {{-- @include('partial.nav-builder', ['noRekenings' => $noRekenings]) --}}
    <div class="row">
        <div class="col-lg-12 mb-3">
            <a href="{{ route('no_rekenings.create') }}" class="btn btn-primary">Tambah No Rekening</a> <!-- Link ke form tambah No Rekening -->
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
