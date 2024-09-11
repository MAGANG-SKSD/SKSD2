@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data SP2D</h1>
    <a href="{{ route('sp2ds.create') }}" class="btn btn-primary">Tambah SP2D</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Desa ID</th>
                <th>Nomor SP2D</th>
                <th>Tanggal SP2D</th>
                <th>Jumlah Dana</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sp2ds as $sp2d)
                <tr>
                    <td>{{ $sp2d->sp2d_id }}</td>
                    <td>{{ $sp2d->desa_id }}</td>
                    <td>{{ $sp2d->nomor_sp2d }}</td>
                    <td>{{ $sp2d->tanggal_sp2d }}</td>
                    <td>{{ $sp2d->jumlah_dana }}</td>
                    <td>
                        <a href="{{ route('sp2ds.edit', $sp2d->sp2d_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('sp2ds.destroy', $sp2d->sp2d_id) }}" method="POST" style="display:inline;">
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
