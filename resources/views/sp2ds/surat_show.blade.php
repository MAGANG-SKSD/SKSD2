@extends('layouts.admin')

@section('title', __('Detail Surat'))

@section('content')
    <h2>{{ __('Detail Surat') }}</h2>

    <p><strong>{{ __('Judul') }}:</strong> {{ $surat->judul }}</p>
    <p><strong>{{ __('Tanggal') }}:</strong> {{ $surat->tanggal }}</p>

    <a href="{{ route('surat.index') }}" class="btn btn-secondary">{{ __('Kembali') }}</a>
@endsection
