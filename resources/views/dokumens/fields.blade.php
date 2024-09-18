<div class="form-group">
    {!! Form::label('dana_id', __('Dana ID')) !!}
    {!! Form::text('dana_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('jenis_dokumen', __('Jenis Dokumen')) !!}
    {!! Form::text('jenis_dokumen', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('file_path', __('Upload Dokumen')) !!}
    {!! Form::file('file_path', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('status_verifikasi', __('Status Verifikasi')) !!}
    {!! Form::select('status_verifikasi', ['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected'], null, ['class' => 'form-control']) !!}
</div>
