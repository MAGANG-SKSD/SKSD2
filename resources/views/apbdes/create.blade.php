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
            <div class="col-md-4 m-auto">
                <div class="card ">
                    <div class="card-header">
                        <h5>{{ __('Create APBDes') }}</h5>
                    </div>
                    {{ Form::open(['url' => 'apbdes', 'method' => 'post']) }}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('name', __('APBDes Name'), ['class' => 'form-label']) }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter APBDes Name')]) }}
                            @error('name')
                                <span class="invalid-name" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('year', __('Year'), ['class' => 'form-label']) }}
                            {{ Form::number('year', null, ['class' => 'form-control', 'placeholder' => __('Enter Year')]) }}
                            @error('year')
                                <span class="invalid-year" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('amount', __('Amount'), ['class' => 'form-label']) }}
                            {{ Form::number('amount', null, ['class' => 'form-control', 'placeholder' => __('Enter Amount')]) }}
                            @error('amount')
                                <span class="invalid-amount" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Tambahkan field lain yang sesuai dengan APBDes -->
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

    <!-- [ sample-page ] end -->
@endsection
