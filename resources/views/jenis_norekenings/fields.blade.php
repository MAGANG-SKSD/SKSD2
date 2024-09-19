<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Klasifikasi Blanaja Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_klasifikasi_blanaja', 'Id Klasifikasi Blanaja:') !!}
    {!! Form::text('id_klasifikasi_blanaja', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('jenisNorekenings.index') }}" class="btn btn-secondary">Cancel</a>
</div>
