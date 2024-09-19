@extends('layouts.admin')
@section('title', __('Edit SP2D'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sp2d.index') }}">{{ __('SP2D') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit') }}</li>
    </ul>
@endsection

@section('content')

    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="section-body">
            <div class="col-md-6 m-auto">
                <div class="card ">
                    <div class="card-header">
                        <h5>{{ __('Edit SP2D') }}</h5>
                    </div>
                    {{ Form::model($sp2d, ['route' => ['sp2d.update', $sp2d->id], 'method' => 'PUT']) }}

                    <div class="card-body">
                        <div class="form-group">
                            <strong>{{ Form::label('title', __('Title'), ['class' => 'form-label']) }}</strong>
                            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter SP2D Title')]) }}
                            @error('title')
                                <span class="invalid-title" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>{{ Form::label('amount', __('Amount'), ['class' => 'form-label']) }}</strong>
                            {{ Form::number('amount', null, ['class' => 'form-control', 'placeholder' => __('Enter SP2D Amount')]) }}
                            @error('amount')
                                <span class="invalid-amount" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Add other fields as necessary -->
                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <a href="{{ route('sp2d.in
