<!-- Dokumen Id Field -->
<div class="form-group">
    {!! Form::label('dokumen_id', 'Dokumen Id:') !!}
    <p>{{ $dokumen->dokumen_id }}</p>
</div>

<!-- Dana Id Field -->
<div class="form-group">
    {!! Form::label('dana_id', 'Dana Id:') !!}
    <p>{{ $dokumen->dana_id }}</p>
</div>

<!-- Jenis Dokumen Field -->
<div class="form-group">
    {!! Form::label('jenis_dokumen', 'Jenis Dokumen:') !!}
    <p>{{ $dokumen->jenis_dokumen }}</p>
</div>

<!-- File Path Field -->
<div class="form-group">
    {!! Form::label('file_path', 'File Path:') !!}
    <p>{{ $dokumen->file_path }}</p>
</div>

<!-- Status Verifikasi Field -->
<div class="form-group">
    {!! Form::label('status_verifikasi', 'Status Verifikasi:') !!}
    <p>{{ $dokumen->status_verifikasi }}</p>
</div>

