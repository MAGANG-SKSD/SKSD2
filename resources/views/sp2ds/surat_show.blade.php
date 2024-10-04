@extends('layouts.admin')

@section('title', __('Detail Surat'))

@section('content')
    <h2>{{ __('Detail Surat') }}</h2>

    <p><strong>{{ __('Nomor SP2D') }}:</strong> {{ $surat->nomor_sp2d }}</p>
    <p><strong>{{ __('Tanggal SP2D') }}:</strong> {{ $surat->tanggal_sp2d }}</p>
    <p><strong>{{ __('Nama Kegiatan') }}:</strong> {{ $surat->nama_kegiatan }}</p>
    <p><strong>{{ __('Nilai SP2D') }}:</strong> {{ number_format($surat->nilai_sp2d, 2, ',', '.') }}</p>
    <p><strong>{{ __('Kode Rekening') }}:</strong> {{ $surat->kode_rekening }}</p>
    <p><strong>{{ __('Nama Penerima') }}:</strong> {{ $surat->nama_penerima }}</p>
    <p><strong>{{ __('Bank Tujuan') }}:</strong> {{ $surat->bank_tujuan }}</p>
    <p><strong>{{ __('Nomor Rekening Bank') }}:</strong> {{ $surat->nomor_rekening_bank }}</p>
    <p><strong>{{ __('Uraian Penggunaan') }}:</strong> {{ $surat->uraian_penggunaan ?? '-' }}</p>
    <p><strong>{{ __('Jenis Belanja') }}:</strong> {{ $surat->jenis_belanja ?? '-' }}</p>
    <p><strong>{{ __('Tahun Anggaran') }}:</strong> {{ $surat->tahun_anggaran }}</p>
    <p><strong>{{ __('Nama Bendahara') }}:</strong> {{ $surat->nama_bendahara }}</p>
    <p><strong>{{ __('Status Verifikasi') }}:</strong> {{ $surat->status_verifikasi }}</p>

    <a href="{{ route('surat.index') }}" class="btn btn-secondary">{{ __('Kembali') }}</a>
@endsection
