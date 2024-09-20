@extends('layouts.admin')

@section('title', __('Create Anggaran Kas'))

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('anggaranKas.index') !!}">{{ __('Anggaran Kas') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('Create') }}</li>
    </ul>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('coreui-templates::common.errors')

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-plus-square-o fa-lg"></i>
                            <strong>{{ __('Create Anggaran Kas') }}</strong>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'anggaranKas.store']) !!}
                                
                                @include('anggaran-kas.fields')

                                <div class="form-group">
                                    <a href="{{ route('anggaranKas.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                                    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
                                </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
