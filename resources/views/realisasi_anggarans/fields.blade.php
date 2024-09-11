<!-- Desa Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('desa_id', 'Desa Id:') !!}
    {!! Form::number('desa_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Tahun Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahun', 'Tahun:') !!}
    {!! Form::text('tahun', null, ['class' => 'form-control','id'=>'tahun']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#tahun').datetimepicker({
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


<!-- Belanja Realisasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('belanja_realisasi', 'Belanja Realisasi:') !!}
    {!! Form::number('belanja_realisasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Dana Tidak Terpakai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dana_tidak_terpakai', 'Dana Tidak Terpakai:') !!}
    {!! Form::number('dana_tidak_terpakai', null, ['class' => 'form-control']) !!}
</div>

<!-- Laporan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('laporan', 'Laporan:') !!}
    {!! Form::text('laporan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('realisasiAnggarans.index') }}" class="btn btn-secondary">Cancel</a>
</div>
