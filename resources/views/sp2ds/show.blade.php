@extends('layouts.admin')

@section('title')
    {{ __('Show SP2D') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Show SP2D') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sp2ds.index') }}">{{ __('Back') }}</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('Desa ID') }}</strong>
                {{ $sp2d->desa_id }}
            </div>
            <div class="form-group">
                <strong>{{ __('Nomor SP2D') }}</strong>
                {{ $sp2d->nomor_sp2d }}
            </div>
            <div class="form-group">
                <strong>{{ __('Tanggal SP2D') }}</strong>
                {{ $sp2d->tanggal_sp2d }}
            </div>
            <div class="form-group">
                <strong>{{ __('Jumlah Dana') }}</strong>
                {{ $sp2d->jumlah_dana }}
            </div>
        </div>
    </div>
@endsection
