<div class="form-group col-sm-6">
    {!! Form::label('kode_rekening', 'Kode Rekening:') !!}
    {!! Form::number('kode_rekening', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('uraian', 'Uraian:') !!}
    {!! Form::text('uraian', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('noRekenings.index') !!}" class="btn btn-default">Cancel</a>
</div>
