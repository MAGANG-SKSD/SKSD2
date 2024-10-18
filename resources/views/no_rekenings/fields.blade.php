<div class="form-group col-sm-6">
    {!! Form::label('id', 'Nomor Rekening:') !!}
    {!! Form::number('id', null, ['class' => 'form-control', 'readonly' => true]) !!} <!-- Field ID, readonly jika ID otomatis -->
</div>

<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!} <!-- Field untuk Nama No Rekening -->
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('no_rekenings.index') !!}" class="btn btn-default">Cancel</a>
</div>
