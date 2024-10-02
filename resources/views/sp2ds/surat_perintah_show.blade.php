@extends('layouts.admin')

@section('title', __('Detail Surat Perintah'))

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('surat_perintah.index') }}">{{ __('Surat Perintah') }}</a></li>
        <li class="breadcrumb-item">{{ __('Detail') }}</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-file-alt"></i>
                    {{ __('Detail Surat Perintah') }}
                </div>
                <div class="card-body">
                    <p><strong>{{ __('Judul:') }}</strong> {{ $suratPerintah->judul }}</p>
                    <p><strong>{{ __('Tanggal:') }}</strong> {{ $suratPerintah->tanggal }}</p>
                    <a href="{{ route('surat_perintah.index') }}" class="btn btn-secondary">{{ __('Kembali') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
