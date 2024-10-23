@extends('layouts.admin')
@section('title', __('No Rekening'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('No Rekening') }}</li>
    </ul>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="jenis_norekening_filter">{{ __('Filter Jenis Norekening') }}</label>
                    <select id="jenis_norekening_filter" class="form-control">
                        <option value="">{{ __('Semua') }}</option>
                        @foreach($jenisNorekeningList as $jenis)
                            <option value="{{ $jenis->jenis_norekening_id }}">{{ $jenis->jenis_norekening->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="kelompok_norekening_filter">{{ __('Filter Kelompok Norekening') }}</label>
                    <select id="kelompok_norekening_filter" class="form-control">
                        <option value="">{{ __('Semua') }}</option>
                        <!-- Options will be populated based on selected Jenis Norekening -->
                    </select>
                </div>

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
        $(document).ready(function() {
            var table = $('table').DataTable(); // Initialize DataTable

            // Fetch Kelompok Norekening based on Jenis Norekening selection
            $('#jenis_norekening_filter').change(function() {
                var jenisNorekeningId = $(this).val();
                $.ajax({
                    url: '{{ route("norekening.getKelompokNorekening") }}',
                    type: 'GET',
                    data: { jenis_norekening_id: jenisNorekeningId },
                    success: function(data) {
                        var $kelompokNorekeningFilter = $('#kelompok_norekening_filter');
                        $kelompokNorekeningFilter.empty().append('<option value="">{{ __('Semua') }}</option>');
                        $.each(data, function(index, kelompok) {
                            $kelompokNorekeningFilter.append('<option value="' + kelompok.kelompok_norekening_id + '">' + kelompok.kelompok_norekening.nama + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error(xhr);
                    }
                });
            });

            // Event listener for both dropdowns
            $('#jenis_norekening_filter, #kelompok_norekening_filter').change(function() {
                applyFilters(); // Call applyFilters when either dropdown changes
            });

            // Function to apply filters and fetch new data
            function applyFilters() {
                $.ajax({
                    url: '{{ route("norekening.filter") }}', // Ensure this route is defined
                    type: 'GET',
                    data: {
                        jenis_norekening_id: $('#jenis_norekening_filter').val(),
                        kelompok_norekening_id: $('#kelompok_norekening_filter').val(),
                    },
                    success: function(data) {
                        console.log(data); // Log the response to check its structure
                        table.clear().rows.add(data).draw(); // Clear the current table data and add new data
                    },
                    error: function(xhr) {
                        console.error(xhr);
                    }
                });
            }
        });
    </script>
@endpush