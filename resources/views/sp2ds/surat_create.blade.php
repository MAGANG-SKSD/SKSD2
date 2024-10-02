@extends('layouts.admin')

@section('title', __('Tambah Surat'))

@section('content')
    <h2>{{ __('Tambah Surat') }}</h2>

    <form action="{{ route('surat.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="judul">{{ __('Judul') }}</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal">{{ __('Tanggal') }}</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
    </form>
@endsection
