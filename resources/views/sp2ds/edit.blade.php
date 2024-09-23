@extends('layouts.admin')

@section('title', __('Edit SP2D'))

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sp2ds.index') }}">{{ __('SP2D') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit SP2D') }}</li>
    </ul>
@endsection

@section('content')

    <div class="row">
        <div class="section-body">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Edit SP2D') }}</h5>
                    </div>
                    {!! Form::model($sp2d, ['method' => 'PATCH', 'route' => ['sp2ds.update', $sp2d->id]]) !!}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('nomor_sp2d', __('Nomor SP2D'), ['class' => 'form-label']) }}
                            {!! Form::text('nomor_sp2d', null, ['placeholder' => __('Nomor SP2D'), 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('tanggal_sp2d', __('Tanggal SP2D'), ['class' => 'form-label']) }}
                            {!! Form::date('tanggal_sp2d', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('jumlah_dana', __('Jumlah Dana'), ['class' => 'form-label']) }}
                            {!! Form::number('jumlah_dana', null, ['placeholder' => __('Jumlah Dana'), 'class' => 'form-control', 'step' => 'any']) !!}
                        </div>

                        <!-- Tambahkan field lain sesuai kebutuhan -->

                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <a href="{{ route('sp2ds.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                            <button type="submit" class="btn btn-primary mb-3">{{ __('Save') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
