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
    {!! Form::label('detail_norekening_id', 'Nomor Rekening :') !!}
    {!! Form::number('detail_norekening_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Dana Tidak Terpakai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan_lainnya', 'Keterangan lainnya :') !!}
    {!! Form::number('keterangan_lainnya', null, ['class' => 'form-control']) !!}
</div>

<!-- Laporan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_anggaran', 'Nilai Anggaran :') !!}
    {!! Form::text('nilai_anggaran', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('realisasi_anggarans.index') }}" class="btn btn-secondary">Cancel</a>
</div>
