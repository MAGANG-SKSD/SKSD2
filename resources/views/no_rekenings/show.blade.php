@extends('layouts.admin')

@section('title', 'Show No Rekening')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show No Rekening</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('no_rekenings.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Rekening:</strong>
                {{ $norekening->nama }}
            </div>
        </div>
    </div>
@endsection
