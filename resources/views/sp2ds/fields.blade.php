<!-- Desa Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('desa_id', 'Desa Id:') !!}
    {!! Form::text('desa_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Sp2D Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_sp2d', 'Nomor Sp2D:') !!}
    {!! Form::number('nomor_sp2d', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Sp2D Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_sp2d', 'Tanggal Sp2D:') !!}
    {!! Form::text('tanggal_sp2d', null, ['class' => 'form-control','id'=>'tanggal_sp2d']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#tanggal_sp2d').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Jumlah Dana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_dana', 'Jumlah Dana:') !!}
    {!! Form::number('jumlah_dana', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('sp2ds.index') }}" class="btn btn-secondary">Cancel</a>
</div>
