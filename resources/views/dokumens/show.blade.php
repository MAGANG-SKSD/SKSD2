@extends('layouts.admin')
@section('title')
    {{ __('Show Dokumen') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Show Dokumen') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dokumens.index') }}">{{ __('Back') }}</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('Dana ID') }}:</strong>
                {{ $dokumen->dana_id }}
            </div>
            <div class="form-group">
                <strong>{{ __('Jenis Dokumen') }}:</strong>
                {{ $dokumen->jenis_dokumen }}
            </div>
            <div class="form-group">
                <strong>{{ __('File Path') }}:</strong>
                <a href="{{ asset($dokumen->file_path) }}" target="_blank">{{ $dokumen->file_path }}</a>
            </div>
            <div class="form-group">
                <strong>{{ __('Status Verifikasi') }}:</strong>
                {{ $dokumen->status_verifikasi }}
            </div>
        </div>
    </div>
@endsection
