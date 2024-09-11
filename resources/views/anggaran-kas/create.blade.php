@extends('layouts.admin')

@section('title', __('Create Anggaran Kas'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('anggaran-kas.index') }}">{{ __('Anggaran Kas') }}</a></li>
        <li class="breadcrumb-item">{{ __('Create Anggaran Kas') }}</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Create Anggaran Kas') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('anggaran-kas.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">{{ __('Nama') }}</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">{{ __('Jumlah') }}</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">{{ __('Keterangan') }}</label>
                            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
