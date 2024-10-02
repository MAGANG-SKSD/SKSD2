@extends('layouts.admin')

@section('title', __('Edit Surat Perintah'))

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('surat_perintah.index') }}">{{ __('Surat Perintah') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit') }}</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-edit"></i>
                    {{ __('Edit Surat Perintah') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('surat_perintah.update', $suratPerintah->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judul">{{ __('Judul') }}</label>
                            <input type="text" class="form-control" name="judul" id="judul" value="{{ $suratPerintah->judul }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">{{ __('Tanggal') }}</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ $suratPerintah->tanggal }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Perbarui') }}</button>
                        <a href="{{ route('surat_perintah.index') }}" class="btn btn-secondary">{{ __('Kembali') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
