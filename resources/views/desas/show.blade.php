@extends('layouts.admin')

@section('title', 'Show Desa')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Desa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('desas.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Desa:</strong>
                {{ $desa->nama_desa }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat Desa:</strong>
                {{ $desa->alamat_desa }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Pos:</strong>
                {{ $desa->kode_pos }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telepon:</strong>
                {{ $desa->telepon }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $desa->email }}
            </div>
        </div>
    </div>
@endsection
