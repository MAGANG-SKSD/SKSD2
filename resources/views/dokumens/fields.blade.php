<!-- Dana Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dana_id', 'Dana Id:') !!}
    {!! Form::number('dana_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Dokumen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_dokumen', 'Jenis Dokumen:') !!}
    {!! Form::text('jenis_dokumen', null, ['class' => 'form-control']) !!}
</div>

<!-- File Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file_path', 'File Path:') !!}
    {!! Form::text('file_path', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Verifikasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_verifikasi', 'Status Verifikasi:') !!}
    {!! Form::text('status_verifikasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('dokumens.index') }}" class="btn btn-secondary">Cancel</a>
</div>
