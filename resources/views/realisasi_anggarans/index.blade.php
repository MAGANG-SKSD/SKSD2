@extends('layouts.admin')
@section('title', __('Realisasi'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('Realisasi') }}</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive py-5 pb-4 dropdown_2">
                        <div class="container-fluid">
                            {{ $dataTable->table(['width' => '100%', 'id' => 'realisasi-table']) }}
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

    <script>
        // Fungsi untuk toggle status
        function toggleStatus(id, status) {
            $.ajax({
                url: '{{ route('realisasi_anggarans.toggle-status', '') }}/' + id,
                type: 'POST',
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.success);
                    $('#realisasi-table').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseJSON.error);
                }
            });
        }

        $(document).ready(function() {
            if ($.fn.dataTable.isDataTable('#realisasi-table')) {
                $('#realisasi-table').DataTable().destroy();
            }

            $('#realisasi-table').DataTable({
                ajax: {
                    url: '{{ route('realisasi_anggarans.index') }}',
                    dataSrc: '',
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'tahun', name: 'tahun' },
                    { data: 'detail_norekening_id', name: 'detail_norekening_id' },
                    { data: 'keterangan_lainnya', name: 'keterangan_lainnya' },
                    { data: 'nilai_anggaran', name: 'nilai_anggaran' },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            var buttonClass = data === 1 ? 'btn-success' : 'btn-danger';
                            var buttonText = data === 1 ? 'Enable' : 'Disable';
                            var disabled = data === 0 ? 'disabled' : '';

                            return `<button class="btn ${buttonClass}" ${disabled} onclick="toggleStatus(${row.id}, ${data})">${buttonText}</button>`;
                        }
                    },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
            });
        });
    </script>
@endpush
