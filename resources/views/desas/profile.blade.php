@extends('layouts.admin')
@section('title', __('Desa Profile'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('Desa Profile') }}</li>
    </ul>
@endsection

@php
use App\Facades\UtilityFacades;
use App\Models\Desa;
$profile = asset(Storage::url('uploads/desas/'));
$setting = UtilityFacades::settings();
$desaDetail = Desa::find(request()->route('desa_id')); // Assuming your route parameter is 'id'
@endphp

@section('content')
    {{-- @include('partial.nav-builder', ['desas' => [$desaDetail]]) --}}
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top">
                        <div class="list-group list-group-flush" desa_id="desas-profile-sidenav">
                            {{-- <a href="desas-profile#desas-add-1"
                                class="list-group-item list-group-item-action desas-add-1 active">{{ __('desas Overview') }}
                                <div class="float-end"></div>
                            </a>
                            <a href="desas-profile#desas-add-2"
                                class="list-group-item list-group-item-action desas-add-2">{{ __('Basic Info') }}
                                <div class="float-end"></div>
                            </a> --}}
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center"> <!-- Pusatkan secara horizontal -->
                    <div class="col-sm-12">
                        <div class="row d-flex justify-content-center"> <!-- Pusatkan secara horizontal -->
                            <div class="col-xl-9">
                                <div desa_id="desas-add-1" class="card bg-primary text-white">
                                    <div class="card-body text-center"> <!-- Pusatkan teks -->
                                        <!-- Menampilkan nama desa -->
                                        <h4 class="mb-1 text-white">{{ $desaDetail->nama_desa }}</h4>
                                    </div>
                                </div>
                                <div desa_id="desas-add-2" class="card">
                                    {{-- <div class="card-header text-center"> <!-- Pusatkan teks -->
                                        <h5>Basic Info</h5>
                                        <small class="text-muted">{{ __('Mandatory informations') }}</small>
                                    </div> --}}
                                    {{ Form::model($desaDetail, ['route' => ['desas.update', $desaDetail->desa_id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                                    <div class="card-body">
                                        <div class="row mt-3 container-fluid">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{ __('Nama Desa') }}</label>
                                                    <input type="text" name="nama_desa" value="{{ $desaDetail->nama_desa }}" class="form-control" placeholder="{{ __('Nama Desa') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{ __('Alamat Desa') }}</label>
                                                    <input type="text" name="alamat_desa" value="{{ $desaDetail->alamat_desa }}" class="form-control" placeholder="{{ __('Alamat Desa') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{ __('Kode Pos') }}</label>
                                                    <input type="text" name="kode_pos" value="{{ $desaDetail->kode_pos }}" class="form-control" placeholder="{{ __('Kode Pos') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{ __('Telepon') }}</label>
                                                    <input type="text" name="telepon" value="{{ $desaDetail->telepon }}" class="form-control" placeholder="{{ __('Telepon') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label">{{ __('Email') }}</label>
                                                    <input type="text" name="email" value="{{ $desaDetail->email }}" class="form-control" placeholder="{{ __('Email') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center"> <!-- Pusatkan tombol -->
                                        <a href="{{ route('desas.index') }}" class="btn btn-secondary mb-3">{{ __('Desa List') }}</a>
                                        <button type="submit" class="btn btn-primary mb-3">{{ __('Update Desa Info') }}</button>
                                        
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on("click", ".desas-add-1", function() {
            $(".desas-add-1").addClass("active");
            $(".desas-add-2").removeClass("active");
        });

        $(document).on("click", ".desas-add-2", function() {
            $(".desas-add-1").removeClass("active");
            $(".desas-add-2").addClass("active");
        });
    </script>
@endpush
