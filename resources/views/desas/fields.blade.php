<!-- Nama Desa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('desa_id', 'Desa id:') !!}
    {!! Form::text('desa_id', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('nama_desa', 'Nama Desa:') !!}
    {!! Form::text('nama_desa', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Desa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat_desa', 'Alamat Desa:') !!}
    {!! Form::text('alamat_desa', null, ['class' => 'form-control']) !!}
</div>

<!-- Kode Pos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_pos', 'Kode Pos:') !!}
    {!! Form::number('kode_pos', null, ['class' => 'form-control']) !!}
</div>

<!-- Telepon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telepon', 'Telepon:') !!}
    {!! Form::number('telepon', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('desas.index') }}" class="btn btn-secondary">Cancel</a>
</div>
