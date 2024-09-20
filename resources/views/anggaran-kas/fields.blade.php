<div class="form-group">
    {!! Form::label('desa_id', __('Desa ID')) !!}
    {!! Form::text('desa_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tahun', __('Tahun')) !!}
    {!! Form::text('tahun', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('total_anggaran', __('Total Anggaran')) !!}
    {!! Form::number('total_anggaran', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('status_persetujuan', __('Status Persetujuan')) !!}
    {!! Form::text('status_persetujuan', null, ['class' => 'form-control']) !!}
</div>
