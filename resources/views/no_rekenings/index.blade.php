@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data No Rekening</h1>
    <a href="{{ route('no_rekenings.create') }}" class="btn btn-primary">Tambah No Rekening</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Desa ID</th>
                <th>Kode Rekening</th>
                <th>Uraian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($noRekenings as $noRekening)
                <tr>
                    <td>{{ $noRekening->no_rekening_id }}</td>
                    <td>{{ $noRekening->desa_id }}</td>
                    <td>{{ $noRekening->kode_rekening }}</td>
                    <td>{{ $noRekening->uraian }}</td>
                    <td>
                        <a href="{{ route('no_rekenings.edit', $noRekening->no_rekening_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('no_rekenings.destroy', $noRekening->no_rekening_id) }}" method="POST" style="display:inline;">
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
