@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Realisasi Anggaran</h1>
    <a href="{{ route('realisasi_anggarans.create') }}" class="btn btn-primary">Tambah Realisasi Anggaran</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Desa ID</th>
                <th>Tahun</th>
                <th>Belanja Realisasi</th>
                <th>Dana Tidak Terpakai</th>
                <th>Laporan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($realisasiAnggarans as $realisasiAnggaran)
                <tr>
                    <td>{{ $realisasiAnggaran->realisasi_id }}</td>
                    <td>{{ $realisasiAnggaran->desa_id }}</td>
                    <td>{{ $realisasiAnggaran->tahun }}</td>
                    <td>{{ $realisasiAnggaran->belanja_realisasi }}</td>
                    <td>{{ $realisasiAnggaran->dana_tidak_terpakai }}</td>
                    <td>{{ $realisasiAnggaran->laporan }}</td>
                    <td>
                        <a href="{{ route('realisasi_anggarans.edit', $realisasiAnggaran->realisasi_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('realisasi_anggarans.destroy', $realisasiAnggaran->realisasi_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
