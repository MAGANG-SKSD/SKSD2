<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $jenisNorekening->id }}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $jenisNorekening->nama }}</p>
</div>

<!-- Id Klasifikasi Blanaja Field -->
<div class="form-group">
    {!! Form::label('id_klasifikasi_blanaja', 'Id Klasifikasi Blanaja:') !!}
    <p>{{ $jenisNorekening->id_klasifikasi_blanaja }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $jenisNorekening->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $jenisNorekening->updated_at }}</p>
</div>

