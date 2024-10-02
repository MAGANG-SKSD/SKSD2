@extends('layouts.admin')

@section('title', __('Edit Surat'))

@section('content')
    <h2>{{ __('Edit Surat') }}</h2>

    <form action="{{ route('surat.update', $surat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">{{ __('Judul') }}</label>
            <input type="text" name="judul" class="form-control" value="{{ $surat->judul }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal">{{ __('Tanggal') }}</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $surat->tanggal }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </form>
@endsection
