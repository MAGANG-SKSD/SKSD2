@extends('layouts.admin')
@section('title')
    {{ __('Show APBDes') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> {{ __('Show APBDes') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('apbdes.index') }}"> {{ __('Back') }}</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('Name') }}</strong>
                {{ $apbdes->name }} <!-- Ganti $role menjadi $apbdes -->
            </div>
        </div>
    </div>
@endsection
