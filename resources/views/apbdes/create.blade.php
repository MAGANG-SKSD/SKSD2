@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah APBDes</h1>
    <form action="{{ route('apbdes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="desa_id">Desa</label>
            <select name="desa_id" id="desa_id" class="form-control @error('desa_id') is-invalid @enderror">
                @foreach($desas as $desa)
                    <option value="{{ $desa->id }}" {{ old('desa_id') == $desa->id ? 'selected' : '' }}>{{ $desa->name }}</option>
                @endforeach
            </select>
            @error('desa_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="text" name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun') }}">
            @error('tahun')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="pendapatan">Pendapatan</label>
            <input type="text" name="pendapatan" id="pendapatan" class="form-control @error('pendapatan') is-invalid @enderror" value="{{ old('pendapatan') }}">
            @error('pendapatan')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="belanja">Belanja</label>
            <input type="text" name="belanja" id="belanja" class="form-control @error('belanja') is-invalid @enderror" value="{{ old('belanja') }}">
            @error('belanja')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="pembiayaan">Pembiayaan</label>
            <input type="text" name="pembiayaan" id="pembiayaan" class="form-control @error('pembiayaan') is-invalid @enderror" value="{{ old('pembiayaan') }}">
            @error('pembiayaan')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="status_verifikasi">Status Verifikasi</label>
            <input type="text" name="status_verifikasi" id="status_verifikasi" class="form-control @error('status_verifikasi') is-invalid @enderror" value="{{ old('status_verifikasi') }}">
            @error('status_verifikasi')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_detail_no_rekening">No Rekening</label>
            <input type="text" name="id_detail_no_rekening" id="id_detail_no_rekening" class="form-control @error('id_detail_no_rekening') is-invalid @enderror" value="{{ old('id_detail_no_rekening') }}">
            @error('id_detail_no_rekening')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
