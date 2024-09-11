@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Dana</h1>
    <a href="{{ route('danas.create') }}" class="btn btn-primary">Tambah Dana</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Desa</th>
                <th>Jenis Dana</th>
                <th>Jumlah Dana</th>
                <th>Status Pengajuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($danas as $dana)
                <tr>
                    <td>{{ $dana->dana_id }}</td>
                    <td>{{ $dana->desa->nama_desa }}</td>
                    <td>{{ $dana->jenis_dana }}</td>
                    <td>{{ $dana->jumlah_dana }}</td>
                    <td>{{ $dana->status_pengajuan }}</td>
                    <td>
                        <a href="{{ route('danas.edit', $dana->dana_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('danas.destroy', $dana->dana_id) }}" method="POST" style="display:inline;">
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
