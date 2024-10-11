@extends('layouts.admin')
@section('title', __('Edit No Rekening'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('no_rekenings.index') }}">{{ __('No Rekening') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit') }}</li>
    </ul>
@endsection

@section('content')

    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="section-body">
            <div class="col-md-4 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Edit No Rekening') }}</h5>
                    </div>
                    {{ Form::model($noRekening, ['route' => ['no_rekenings.update', $noRekening->id], 'method' => 'PUT']) }}

                    <div class="card-body">
                        <div class="form-group">
                            <strong>{{ Form::label('nama', __('Nama Rekening'), ['class' => 'form-label']) }}</strong>
                            {{ Form::text('nama', null, ['class' => 'form-control', 'placeholder' => __('Masukkan Nama Rekening')]) }}
                            @error('nama')
                                <span class="invalid-nama" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <a href="{{ route('no_rekenings.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                            <button type="submit" class="btn btn-primary mb-3">{{ __('Update') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- [ Main Content ] end -->
@endsection
