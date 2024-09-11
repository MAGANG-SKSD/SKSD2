@extends('layouts.admin')

@section('title', __('Edit Anggaran Kas'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('anggaran-kas.index') }}">{{ __('Anggaran Kas') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit Anggaran Kas') }}</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Edit Anggaran Kas') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('anggaran-kas.update', $anggaranKas->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">{{ __('Nama') }}</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $anggaranKas->nama) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">{{ __('Jumlah') }}</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" step="0.01" value="{{ old('jumlah', $anggaranKas->jumlah) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">{{ __('Keterangan') }}</label>
                            <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan', $anggaranKas->keterangan) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
