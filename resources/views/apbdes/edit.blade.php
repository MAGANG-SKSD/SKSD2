@extends('layouts.admin')
@section('title', __('Edit APBDes'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('apbdes.index') }}">{{ __('APBDes') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit APBDes') }}</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Edit APBDes') }}</h5>
                </div>
                {!! Form::model($apbdes, ['method' => 'PATCH', 'route' => ['apbdes.update', $apbdes->id]]) !!}
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::label('desa_id', __('Desa ID'), ['class' => 'form-label']) }}
                        {!! Form::number('desa_id', null, ['placeholder' => __('Desa ID'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('tahun', __('Tahun'), ['class' => 'form-label']) }}
                        {!! Form::number('tahun', null, ['placeholder' => __('Tahun'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('pendapatan', __('Pendapatan'), ['class' => 'form-label']) }}
                        {!! Form::number('pendapatan', null, ['placeholder' => __('Pendapatan'), 'class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('belanja', __('Belanja'), ['class' => 'form-label']) }}
                        {!! Form::number('belanja', null, ['placeholder' => __('Belanja'), 'class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('pembiayaan', __('Pembiayaan'), ['class' => 'form-label']) }}
                        {!! Form::number('pembiayaan', null, ['placeholder' => __('Pembiayaan'), 'class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('status_verifikasi', __('Status Verifikasi'), ['class' => 'form-label']) }}
                        {!! Form::text('status_verifikasi', null, ['placeholder' => __('Status Verifikasi'), 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('id_detail_no_rekening', __('ID Detail No Rekening'), ['class' => 'form-label']) }}
                        {!! Form::number('id_detail_no_rekening', null, ['placeholder' => __('ID Detail No Rekening'), 'class' => 'form-control']) !!}
                    </div>
                    {{ Form::hidden('old_name', $apbdes->name) }}
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('apbdes.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                        <button type="submit" class="btn btn-primary mb-3">{{ __('Save') }}</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
