@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Anggaran APBDes</h1>

    <div class="mb-3">
        <a href="{{ route('anggaran.create') }}" class="btn btn-primary">Tambah Anggaran Baru</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Tahun</th>
                <th>Detail No Rekening</th>
                <th>Nilai Anggaran</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($anggaran as $item)
                <tr>
                    <td>{{ $item->tahun }}</td>
                    <td>{{ $item->detail_norekening->nama ?? '-' }}</td>
                    <td>Rp. {{ number_format($item->nilai_anggaran, 2, ',', '.') }}</td>
                    <td>{{ $item->keterangan_lainnya ?? '-' }}</td>
                    <td>{{ $item->verifikasi ? 'Disetujui' : 'Belum Disetujui' }}</td>
                    <td>
                        <a href="{{ route('anggaran.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('anggaran.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus anggaran ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data anggaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $anggaran->links() }} <!-- Pagination -->

</div>
@endsection
