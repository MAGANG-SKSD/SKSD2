@extends('layouts.admin')
@section('title', __('Create SP2D'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sp2d.index') }}">{{ __('SP2D') }}</a></li>
        <li class="breadcrumb-item">{{ __('Create SP2D') }}</li>
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
                        <h5>{{ __('Create SP2D') }}</h5>
                    </div>
                    {{ Form::open(['url' => 'sp2d', 'method' => 'post']) }}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('name', __('Name'), ['class' => 'form-label']) }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter SP2D Name')]) }}
                            @error('name')
                                <span class="invalid-name" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @if (!$roles->isEmpty())
                                <div class="form-group row">
                                    {{ Form::label('Assign SP2D to Roles', __('Assign SP2D to Roles'), ['class' => 'col-md-12 col-form-label']) }}
                                    <div class="col-md-12 col-form-label">
                                        @foreach ($roles as $role)
                                            <div class="form-check form-check-inline me-2">
                                                {{ Form::checkbox('roles[]', $role->id, false, ['class' => 'form-check-input', 'id' => 'role' . $role->id]) }}
                                                {{ Form::label('role' . $role->id, __(ucfirst($role->name)), ['class' => 'form-label']) }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @error('roles')
                                <span class="invalid-roles" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="float-end">
                            <a href="{{ route('sp2d.index') }}" class="btn btn-secondary mb-3">{{ __('Cancel') }}</a>
                            <button type="submit" class="btn btn-primary mb-3">{{ __('Save') }}</button>
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
