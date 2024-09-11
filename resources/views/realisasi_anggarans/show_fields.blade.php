<!-- Realisasi Id Field -->
<div class="form-group">
    {!! Form::label('realisasi_id', 'Realisasi Id:') !!}
    <p>{{ $realisasiAnggaran->realisasi_id }}</p>
</div>

<!-- Desa Id Field -->
<div class="form-group">
    {!! Form::label('desa_id', 'Desa Id:') !!}
    <p>{{ $realisasiAnggaran->desa_id }}</p>
</div>

<!-- Tahun Field -->
<div class="form-group">
    {!! Form::label('tahun', 'Tahun:') !!}
    <p>{{ $realisasiAnggaran->tahun }}</p>
</div>

<!-- Belanja Realisasi Field -->
<div class="form-group">
    {!! Form::label('belanja_realisasi', 'Belanja Realisasi:') !!}
    <p>{{ $realisasiAnggaran->belanja_realisasi }}</p>
</div>

<!-- Dana Tidak Terpakai Field -->
<div class="form-group">
    {!! Form::label('dana_tidak_terpakai', 'Dana Tidak Terpakai:') !!}
    <p>{{ $realisasiAnggaran->dana_tidak_terpakai }}</p>
</div>

<!-- Laporan Field -->
<div class="form-group">
    {!! Form::label('laporan', 'Laporan:') !!}
    <p>{{ $realisasiAnggaran->laporan }}</p>
</div>

