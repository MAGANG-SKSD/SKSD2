@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar APBDes</h1>
    <a href="{{ route('apbdes.create') }}" class="btn btn-primary mb-3">Tambah APBDes</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Desa</th>
                <th>Tahun</th>
                <th>Pendapatan</th>
                <th>Belanja</th>
                <th>Pembiayaan</th>
                <th>Status Verifikasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apbdes as $item)
                <tr>
                    <td>{{ $item->apbdes_id }}</td>
                    <td>{{ $item->desa->nama_desa }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>{{ $item->pendapatan }}</td>
                    <td>{{ $item->belanja }}</td>
                    <td>{{ $item->pembiayaan }}</td>
                    <td>{{ $item->status_verifikasi }}</td>
                    <td>
                        <a href="{{ route('apbdes.edit', $item->apbdes_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('apbdes.destroy', $item->apbdes_id) }}" method="POST" style="display:inline;">
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
