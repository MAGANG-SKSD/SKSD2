@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Dokumen</h1>
    <a href="{{ route('dokumens.create') }}" class="btn btn-primary">Tambah Dokumen</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Jenis Dokumen</th>
                <th>File Path</th>
                <th>Status Verifikasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dokumens as $dokumen)
                <tr>
                    <td>{{ $dokumen->dokumen_id }}</td>
                    <td>{{ $dokumen->jenis_dokumen }}</td>
                    <td>{{ $dokumen->file_path }}</td>
                    <td>{{ $dokumen->status_verifikasi }}</td>
                    <td>
                        <a href="{{ route('dokumens.edit', $dokumen->dokumen_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('dokumens.destroy', $dokumen->dokumen_id) }}" method="POST" style="display:inline;">
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
