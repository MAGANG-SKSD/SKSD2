@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Anggaran</h1>

    <form action="{{ route('anggaran.update', $anggaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="number" class="form-control" name="tahun" id="tahun" value="{{ old('tahun', $anggaran->tahun) }}" required>
        </div>

        <div class="form-group">
            <label for="detail_norekening_id">Detail Norekening</label>
            <select name="detail_norekening_id" class="form-control" required>
                @foreach ($detailNorekening as $detail)
                    <option value="{{ $detail->id }}" {{ $anggaran->detail_norekening_id == $detail->id ? 'selected' : '' }}>
                        {{ $detail->nama }} - {{ $detail->jenis_norekening->nama }} - {{ $detail->jenis_norekening->kelompok_norekening->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nilai_anggaran">Nilai Anggaran</label>
            <input type="number" class="form-control" name="nilai_anggaran" id="nilai_anggaran" value="{{ old('nilai_anggaran', $anggaran->nilai_anggaran) }}" required>
        </div>

        <div class="form-group">
            <label for="keterangan_lainnya">Keterangan Lainnya</label>
            <textarea class="form-control" name="keterangan_lainnya" id="keterangan_lainnya">{{ old('keterangan_lainnya', $anggaran->keterangan_lainnya) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Anggaran</button>
    </form>
</div>
@endsection
