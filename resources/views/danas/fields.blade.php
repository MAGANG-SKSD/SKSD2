<!-- Desa Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('desa_id', 'Desa Id:') !!}
    {!! Form::number('desa_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Dana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_dana', 'Jenis Dana:') !!}
    {!! Form::number('jenis_dana', null, ['class' => 'form-control']) !!}
</div>

<!-- Jumlah Dana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_dana', 'Jumlah Dana:') !!}
    {!! Form::number('jumlah_dana', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Pengajuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_pengajuan', 'Status Pengajuan:') !!}
    {!! Form::text('status_pengajuan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('danas.index') }}" class="btn btn-secondary">Cancel</a>
</div>
