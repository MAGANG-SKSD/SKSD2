<!-- Tahun Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahun', 'Tahun:') !!}
    {!! Form::text('tahun', null, ['class' => 'form-control','id'=>'tahun']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::checkbox('status', 1, null, ['class' => 'form-control']) !!}
</div>

<!-- Belanja Realisasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('detail_norekening_id', 'Nomor Rekening:') !!}
    {!! Form::number('detail_norekening_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Dana Tidak Terpakai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan_lainnya', 'Keterangan lainnya:') !!}
    {!! Form::number('keterangan_lainnya', null, ['class' => 'form-control']) !!}
</div>

<!-- Laporan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_anggaran', 'Nilai Anggaran:') !!}
    {!! Form::text('nilai_anggaran', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('realisasi_anggarans.index') }}" class="btn btn-secondary">Cancel</a>
</div>
