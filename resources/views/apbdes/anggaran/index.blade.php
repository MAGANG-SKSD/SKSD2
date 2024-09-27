@extends('layouts.admin')

@section('title', 'Daftar Anggaran')

@section('content')
    <h1>Daftar Anggaran</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Anggaran</th>
                <th>Nilai Anggaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggaran as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_anggaran }}</td>
                    <td>{{ number_format($item->nilai_anggaran, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('anggaran.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('anggaran.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus anggaran ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
