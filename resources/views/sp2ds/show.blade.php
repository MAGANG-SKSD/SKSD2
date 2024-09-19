@extends('layouts.admin')
@section('title')
    {{ __('Show SP2D') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Show SP2D') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sp2d.index') }}">{{ __('Back') }}</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('Title') }}</strong>
                {{ $sp2d->title }}
            </div>
            <div class="form-group">
                <strong>{{ __('Amount') }}</strong>
                {{ $sp2d->amount }}
            </div>
            <!-- Add other fields as necessary -->
        </div>
    </div>
@endsection
