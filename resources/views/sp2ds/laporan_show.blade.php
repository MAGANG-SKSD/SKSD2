@extends('layouts.admin')

@section('title', __('Detail Laporan'))

@section('content')
    <h2>Detail Laporan</h2>
    
    <div>
        <strong>Judul:</strong> {{ $laporan->judul }}
    </div>
    <div>
        <strong>Tanggal:</strong> {{ $laporan->tanggal }}
    </div>
    <a href="{{ route('laporan.edit', $laporan->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">Hapus</button>
    </form>
    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
