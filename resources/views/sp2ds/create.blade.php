@extends('layouts.admin')

@section('title', __('Create SP2D'))

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! route('sp2ds.index') !!}">{{ __('SP2D') }}</a>
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
                            <strong>{{ __('Create SP2D') }}</strong>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'sp2ds.store']) !!}

                                @include('sp2ds.fields')  <!-- Assuming the fields file is named 'fields.blade.php' in the 'sp2ds' directory -->

                                

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
