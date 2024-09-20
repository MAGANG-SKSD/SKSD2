@extends('layouts.admin')
@section('title', __('Edit Anggaran Kas'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('anggaranKas.index') }}">{{ __('Anggaran Kas') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit Anggaran Kas') }}</li>
    </ul>
@endsection

@section('content')

    <div class="row">
        <div class="section-body">
            <div class="col-md-4 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Edit Anggaran Kas') }}</h5>
                    </div>
                    {!! Form::model($anggaranKas, ['method' => 'PATCH', 'route' => ['anggaranKas.update', $anggaranKas->id]]) !!}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('name', __('Name'), ['class' => 'form-label']) }}
                            {!! Form::text('name', null, ['placeholder' => __('Name'), 'class' => 'form-control']) !!}
                            {!! Form::hidden('old_name', $anggaranKas->name, ['placeholder' => __('Name'), 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <a href="{{ route('anggaranKas.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                            <button type="submit" class="btn btn-primary mb-3">{{ __('Save') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
