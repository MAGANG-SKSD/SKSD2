<!-- Desa Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('desa_id', 'Desa Id:') !!}
    {!! Form::number('desa_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Tahun Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahun', 'Tahun:') !!}
    {!! Form::number('tahun', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Anggaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_anggaran', 'Total Anggaran:') !!}
    {!! Form::number('total_anggaran', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Persetujuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status persetujuan', 'Status Persetujuan:') !!}
    {!! Form::text('status persetujuan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('anggaran-kas.index') }}" class="btn btn-secondary">Cancel</a>
</div>
