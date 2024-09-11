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

<!-- Pendapatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pendapatan', 'Pendapatan:') !!}
    {!! Form::number('pendapatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Belanja Field -->
<div class="form-group col-sm-6">
    {!! Form::label('belanja', 'Belanja:') !!}
    {!! Form::number('belanja', null, ['class' => 'form-control']) !!}
</div>

<!-- Pembiayaan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pembiayaan', 'Pembiayaan:') !!}
    {!! Form::number('pembiayaan', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Verifikasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_verifikasi', 'Status Verifikasi:') !!}
    {!! Form::text('status_verifikasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('apbdes.index') }}" class="btn btn-secondary">Cancel</a>
</div>
