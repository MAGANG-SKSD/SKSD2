@extends('layouts.admin')
@section('title', __('Edit SP2D'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sp2d.index') }}">{{ __('SP2D') }}</a></li>
        <li class="breadcrumb-item">{{ __('Edit') }}</li>
    </ul>
@endsection

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('sp2ds.index') !!}">Sp2D</a>
          </li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Edit Sp2D</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($sp2d, ['route' => ['sp2ds.update', $sp2d->id], 'method' => 'patch']) !!}

                              @include('sp2ds.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection