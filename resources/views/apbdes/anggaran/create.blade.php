@extends('layouts.admin')
@section('title', __('Tambah Anggaran'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('anggaran.index') }}">{{ __('APBDes') }}</a></li>
        <li class="breadcrumb-item">{{ __('Tambah Anggaran') }}</li>
    </ul>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2>{{ __('Tambah Anggaran') }}</h2>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('anggaran.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tahun">{{ __('Tahun') }}</label>
                            <input type="number" name="tahun" id="tahun" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="detail_norekening_id">{{ __('Detail No Rekening') }}</label>
                            <select name="detail_norekening_id" id="detail_norekening_id" class="form-control" required>
                                <option value="">{{ __('Pilih Detail No Rekening') }}</option>
                                @foreach($jenis_norekening as $jn)
                                    <option value="{{ $jn->id }}">{{ $jn->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nilai_anggaran">{{ __('Nilai Anggaran') }}</label>
                            <input type="number" name="nilai_anggaran" id="nilai_anggaran" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan_lainnya">{{ __('Keterangan Lainnya') }}</label>
                            <textarea name="keterangan_lainnya" id="keterangan_lainnya" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
@endpush
