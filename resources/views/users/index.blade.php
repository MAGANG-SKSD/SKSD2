@extends('layouts.admin')
@section('title', __('Users'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('Users') }}</li>
    </ul>
@endsection

@section('content')

    <div class="row">
        <!-- Mengubah kolom agar lebih fleksibel di layar yang lebih kecil -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Menambahkan table-responsive untuk memastikan tabel responsif -->
                    <div class="table-responsive py-3 pb-4 dropdown_2">
                        <div class="container-fluid">
                            <!-- Menambahkan class 'table' untuk konsistensi dan memastikan responsivitas tabel -->
                            {{ $dataTable->table(['class' => 'table table-striped table-bordered', 'width' => '100%']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
    @include('layouts.includes.datatable_css')
@endpush

@push('scripts')
    @include('layouts.includes.datatable_js')
    {{ $dataTable->scripts() }}
@endpush
