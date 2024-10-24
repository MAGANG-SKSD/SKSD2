@extends('layouts.admin')
@section('title', __('No Rekening '))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('No Rekening') }}
        </li>
    </ul>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive py-5 pb-4 dropdown_2">
                        <div class="container-fluid">
                            {{ $dataTable->table(['width' => '100%']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('style')
    @include('layouts.includes.datatable_css')
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">

@endpush
@push('scripts')
    @include('layouts.includes.datatable_js')
    {{ $dataTable->scripts() }}
    <script>
        // Tambahkan script untuk menangani klik pada baris tabel
        $(document).ready(function() {
            // Menggunakan event delegation untuk mengikat event pada baris
            $('table').on('click', 'tbody tr', function() {
                // Ambil jenis_norekening_id dari baris yang diklik
                var jenisNorekeningId = $(this).data('jenis_norekening_id'); // Ambil data-id yang diatur di baris

                // Redirect ke halaman yang sesuai, misalnya ke kelompok_norekening berdasarkan jenis norekening
                window.location.href = "/kelompok-norekening/" + jenisNorekeningId;
            });
        });
    </script>
@endpush
