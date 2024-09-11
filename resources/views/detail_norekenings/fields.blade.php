<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Klasifikasi Norekening Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_klasifikasi_norekening', 'Id Klasifikasi Norekening:') !!}
    {!! Form::number('id_klasifikasi_norekening', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Jenis Norekening Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_jenis_norekening', 'Id Jenis Norekening:') !!}
    {!! Form::number('id_jenis_norekening', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Kelompok Norekening Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kelompok_norekening', 'Id Kelompok Norekening:') !!}
    {!! Form::number('id_kelompok_norekening', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('detailNorekenings.index') }}" class="btn btn-secondary">Cancel</a>
</div>
