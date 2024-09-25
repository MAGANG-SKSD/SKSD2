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
        $(document).ready(function() {
            $('#realisasi-table').DataTable({
                // Other configurations...
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'tahun', name: 'tahun' },
                    { data: 'detail_norekening_id', name: 'detail_norekening_id' },
                    { data: 'keterangan_lainnya', name: 'keterangan_lainnya' },
                    { data: 'nilai_anggaran', name: 'nilai_anggaran' },
                    { data: 'status', name: 'status', orderable: false, searchable: false }, // Your added column
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
            });

            function edit(id) {
                window.location.href = '/path/to/edit/' + id;
            }

            function delete(id) {
                if (confirm('Anda yakin ingin menghapus item ini?')) {
                    $.ajax({
                        url: '/path/to/delete/' + id,
                        type: 'DELETE',
                        success: function(result) {
                            $('#realisasi-table').DataTable().ajax.reload();
                        },
                        error: function(err) {
                            alert('Terjadi kesalahan!');
                        }
                    });
                }
            }
        });
    </script>
@endpush
