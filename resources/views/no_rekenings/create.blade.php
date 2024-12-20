@extends('layouts.admin')
@section('title', __('Create Rekening '))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('no_rekenings.index') }}">{{ __('Rekening') }}</a></li>
        <li class="breadcrumb-item">{{ __('Rekening') }}
        </li>
    </ul>
@endsection

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('no_rekenings.index') !!}">Rekening</a>
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
                                <strong>Create Rekening</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'no_rekenings.store']) !!}

                                   @include('no_rekenings.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection