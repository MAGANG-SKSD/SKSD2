<div class="form-group">
    {!! Form::label('nomor_sp2d', __('Nomor SP2D')) !!}
    {!! Form::text('nomor_sp2d', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tanggal_sp2d', __('Tanggal SP2D')) !!}
    {!! Form::date('tanggal_sp2d', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('jumlah_dana', __('Jumlah Dana')) !!}
    {!! Form::number('jumlah_dana', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<!-- Jika ada field tambahan, tambahkan di sini -->
