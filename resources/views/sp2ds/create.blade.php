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
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('sp2ds.index') !!}">Sp2D</a>
      </li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Create Sp2D</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'sp2ds.store']) !!}

                                   @include('sp2ds.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
