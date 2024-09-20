@extends('layouts.admin')
@section('title')
    {{ __('Show Anggaran Kas') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Show Anggaran Kas') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('anggaranKas.index') }}">{{ __('Back') }}</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('Name') }}</strong>
                {{ $anggaranKas->name }}
            </div>
            <div class="form-group">
                <strong>{{ __('Jenis Dana') }}</strong>
                {{ $anggaranKas->jenis_dana }}
            </div>
            <div class="form-group">
                <strong>{{ __('Jumlah Dana') }}</strong>
                {{ $anggaranKas->jumlah_dana }}
            </div>
            <div class="form-group">
                <strong>{{ __('Status Pengajuan') }}</strong>
                {{ $anggaranKas->status_pengajuan }}
            </div>
        </div>
    </div>
@endsection
