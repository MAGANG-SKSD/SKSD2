@extends('layouts.admin')
@section('title', __('Create APBDes'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('apbdes.index') }}">{{ __('APBDes') }}</a></li>
        <li class="breadcrumb-item">{{ __('Create APBDes') }}</li>
    </ul>
@endsection

@section('content')
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="section-body">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Create APBDes') }}</h5>
                    </div>
                    {!! Form::open(['route' => 'apbdes.store', 'method' => 'POST']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('desa_id', __('Desa ID'), ['class' => 'form-label']) }}
                            {!! Form::number('desa_id', null, ['placeholder' => __('Desa ID'), 'required' => true, 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('tahun', __('Tahun'), ['class' => 'form-label']) }}
                            {!! Form::number('tahun', null, ['placeholder' => __('Tahun'), 'required' => true, 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('pendapatan', __('Pendapatan'), ['class' => 'form-label']) }}
                            {!! Form::text('pendapatan', null, ['placeholder' => __('Pendapatan'), 'required' => true, 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('belanja', __('Belanja'), ['class' => 'form-label']) }}
                            {!! Form::text('belanja', null, ['placeholder' => __('Belanja'), 'required' => true, 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('pembiayaan', __('Pembiayaan'), ['class' => 'form-label']) }}
                            {!! Form::text('pembiayaan', null, ['placeholder' => __('Pembiayaan'), 'required' => true, 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('status_verifikasi', __('Status Verifikasi'), ['class' => 'form-label']) }}
                            {!! Form::text('status_verifikasi', null, ['placeholder' => __('Status Verifikasi'), 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('id_detail_no_rekening', __('No Rekening'), ['class' => 'form-label']) }}
                            {!! Form::number('id_detail_no_rekening', null, ['placeholder' => __('No Rekening'), 'class' => 'form-control']) !!}
                        </div>
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
    </div>
    <!-- [ Main Content ] end -->
@endsection
