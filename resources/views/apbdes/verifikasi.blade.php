@extends('layouts.admin')
@section('title', __('APBDes'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('APBDes') }}</li>
    </ul>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2>{{ __('Verifikasi Anggaran') }}</h2>
                    <div class="table-responsive py-5 pb-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Tahun') }}</th>
                                    <th>{{ __('No Rekening') }}</th>
                                    <th>{{ __('Verifikasi') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anggaran as $item)
                                <tr>
                                    <td>{{ $item->tahun }}</td>
                                    <td>{{ $item->detail_norekening_id }}</td>
                                    <td>{{ $item->verifikasi ? __('Verified') : __('Not Verified') }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('apbdes.verifikasi.toggle', $item->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-sm {{ $item->verifikasi ? 'btn-danger' : 'btn-success' }}">
                                                {{ $item->verifikasi ? __('Unverify') : __('Verify') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
@endpush

@push('scripts')
    {{-- If you still need DataTable scripts, you can keep this --}}
    @include('layouts.includes.datatable_js')
@endpush
