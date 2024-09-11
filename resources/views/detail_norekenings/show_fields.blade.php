<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $detailNorekening->id }}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $detailNorekening->nama }}</p>
</div>

<!-- Id Klasifikasi Norekening Field -->
<div class="form-group">
    {!! Form::label('id_klasifikasi_norekening', 'Id Klasifikasi Norekening:') !!}
    <p>{{ $detailNorekening->id_klasifikasi_norekening }}</p>
</div>

<!-- Id Jenis Norekening Field -->
<div class="form-group">
    {!! Form::label('id_jenis_norekening', 'Id Jenis Norekening:') !!}
    <p>{{ $detailNorekening->id_jenis_norekening }}</p>
</div>

<!-- Id Kelompok Norekening Field -->
<div class="form-group">
    {!! Form::label('id_kelompok_norekening', 'Id Kelompok Norekening:') !!}
    <p>{{ $detailNorekening->id_kelompok_norekening }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $detailNorekening->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $detailNorekening->updated_at }}</p>
</div>

