@extends('layouts.admin')
@section('title', __('Show APBDes'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('Detail APBDes') }}</strong>
                </div>
                <div class="card-body">
                    <p><strong>{{ __('Desa') }}:</strong> {{ $apbdes->desa->name }}</p>
                    <p><strong>{{ __('Tahun') }}:</strong> {{ $apbdes->tahun }}</p>
                    <p><strong>{{ __('Total Anggaran') }}:</strong> {{ number_format($apbdes->total_anggaran, 0, ',', '.') }}</p>
                    <p><strong>{{ __('Status Persetujuan') }}:</strong> {{ ucfirst($apbdes->status_persetujuan) }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
