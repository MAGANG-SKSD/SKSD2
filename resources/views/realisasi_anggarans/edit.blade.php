@extends('layouts.admin')
@section('title', __('Edit Realisasi '))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('realisasi_anggarans.index') }}">{{ __('Realisasi Anggaran') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit') }}
        </li>
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
                        <h5> {{ __('Edit Realisasi Anggaran') }}</h5>
                    </div>
                    {{ Form::model($realisasi, ['route' => ['realisasi_anggarans.update', $realisasi->id], 'method' => 'PUT']) }}

                    <div class="card-body">
                        <div class="form-group">
                            <strong> {{ Form::label('name', __('Name'), ['class' => 'form-label']) }} </strong>
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Realisasi Name')]) }}
                            @error('name')
                                <span class="invalid-name" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <a href="{{ route('realisasi_anggarans.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                            <button type="submit" class="btn btn-primary mb-3">{{ __('Update') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
    </div>
    </div>
@endsection

