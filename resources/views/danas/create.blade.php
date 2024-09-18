@extends('layouts.admin')
@section('title', __('Create Realisasi '))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('realisasi_anggarans.index') }}">{{ __('Realisasi Anggarans') }}</a></li>
        <li class="breadcrumb-item">{{ __('Realisasi Anggaran') }}
        </li>
    </ul>
@endsection

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('realisasi_anggarans.index') !!}">Anggaran Realisasi</a>
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
                                <strong>Create Anggaran Realisasi</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'realisasi_anggarans.store']) !!}

                                   @include('realisasi_anggarans.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection