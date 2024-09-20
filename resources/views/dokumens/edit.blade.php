@extends('layouts.admin')
@section('title', __('Edit Dokumen'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dokumens.index') }}">{{ __('Dokumen') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit Dokumen') }}</li>
    </ul>
@endsection

@section('content')

    <div class="row">
        <div class="section-body">
            <div class="col-md-4 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Edit Dokumen') }}</h5>
                    </div>
                    {!! Form::model($dokumen, ['method' => 'PATCH', 'route' => ['dokumens.update', $dokumen->id], 'enctype' => 'multipart/form-data']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('dana_id', __('Dana ID'), ['class' => 'form-label']) }}
                            {!! Form::text('dana_id', null, ['placeholder' => __('Dana ID'), 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('jenis_dokumen', __('Jenis Dokumen'), ['class' => 'form-label']) }}
                            {!! Form::text('jenis_dokumen', null, ['placeholder' => __('Jenis Dokumen'), 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('file_path', __('Upload Dokumen'), ['class' => 'form-label']) }}
                            {!! Form::file('file_path', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('status_verifikasi', __('Status Verifikasi'), ['class' => 'form-label']) }}
                            {!! Form::select('status_verifikasi', ['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected'], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <a href="{{ route('dokumens.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                            <button type="submit" class="btn btn-primary mb-3">{{ __('Save') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
