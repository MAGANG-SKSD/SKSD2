<!-- Dana Id Field -->
<div class="form-group">
    {!! Form::label('dana_id', 'Dana Id:') !!}
    <p>{{ $dana->dana_id }}</p>
</div>

<!-- Desa Id Field -->
<div class="form-group">
    {!! Form::label('desa_id', 'Desa Id:') !!}
    <p>{{ $dana->desa_id }}</p>
</div>

<!-- Jenis Dana Field -->
<div class="form-group">
    {!! Form::label('jenis_dana', 'Jenis Dana:') !!}
    <p>{{ $dana->jenis_dana }}</p>
</div>

<!-- Jumlah Dana Field -->
<div class="form-group">
    {!! Form::label('jumlah_dana', 'Jumlah Dana:') !!}
    <p>{{ $dana->jumlah_dana }}</p>
</div>

<!-- Status Pengajuan Field -->
<div class="form-group">
    {!! Form::label('status_pengajuan', 'Status Pengajuan:') !!}
    <p>{{ $dana->status_pengajuan }}</p>
</div>

