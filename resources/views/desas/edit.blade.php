@extends('layouts.admin')

@section('title', __('Edit Desa'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('desas.index') }}">{{ __('Desas') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit Desa') }}</li>
    </ul>
@endsection

@section('content')

    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="section-body">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Edit Desa') }}</h5>
                    </div>
                    <form action="{{ route('desas.update', $desa) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_desa" class="col-form-label">{{ __('Nama Desa') }}</label>
                                <input type="text" name="nama_desa" id="nama_desa" class="form-control" value="{{ old('nama_desa', $desa->nama_desa) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat_desa" class="col-form-label">{{ __('Alamat Desa') }}</label>
                                <input type="text" name="alamat_desa" id="alamat_desa" class="form-control" value="{{ old('alamat_desa', $desa->alamat_desa) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="kode_pos" class="col-form-label">{{ __('Kode Pos') }}</label>
                                <input type="number" name="kode_pos" id="kode_pos" class="form-control" value="{{ old('kode_pos', $desa->kode_pos) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="telepon" class="col-form-label">{{ __('Telepon') }}</label>
                                <input type="text" name="telepon" id="telepon" class="form-control" value="{{ old('telepon', $desa->telepon) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-form-label">{{ __('Email') }}</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $desa->email) }}" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-end">
                                <a href="{{ route('desas.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                                <button type="submit" class="btn btn-primary mb-3">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- [ Main Content ] end -->
@endsection
