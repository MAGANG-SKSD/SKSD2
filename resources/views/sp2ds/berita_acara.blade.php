@extends('layouts.admin')

@section('title', __('Berita Acara Rekonsiliasi'))

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('download.berita_acara') }}" class="btn btn-primary">Download Berita Acara</a>
        </div>
        <h2 class="text-center">BERITA ACARA REKONSILIASI</h2>
        <p class="text-center">Pendapatan, Belanja, dan SP2D</p>
        
        <p>Pada hari ini, <strong>{{ $hari }}</strong>, tanggal <strong>{{ $tanggal }}</strong>, bulan <strong>{{ $bulan }}</strong>, tahun <strong>{{ $tahun }}</strong>, bertempat di <strong>{{ $lokasi }}</strong>, telah dilakukan rekonsiliasi pendapatan, belanja, dan SP2D antara:</p>
        
        <div class="mb-4">
            <p><strong>1. Nama Pejabat 1:</strong> {{ $pejabat1['nama'] }}</p>
            <p><strong>Jabatan:</strong> {{ $pejabat1['jabatan'] }}</p>
            <p><strong>Instansi:</strong> {{ $pejabat1['instansi'] }}</p>
        </div>

        <div class="mb-4">
            <p><strong>2. Nama Pejabat 2:</strong> {{ $pejabat2['nama'] }}</p>
            <p><strong>Jabatan:</strong> {{ $pejabat2['jabatan'] }}</p>
            <p><strong>Instansi:</strong> {{ $pejabat2['instansi'] }}</p>
        </div>

        <p>Berikut adalah hasil rekonsiliasi yang telah disepakati:</p>

        <h4>Pendapatan</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Pendapatan</th>
                    <th>Anggaran</th>
                    <th>Realisasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendapatan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ number_format($item->anggaran, 2, ',', '.') }}</td>
                    <td>{{ number_format($item->realisasi, 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h4>Belanja</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Belanja</th>
                    <th>Anggaran</th>
                    <th>Realisasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($belanja as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ number_format($item->anggaran, 2, ',', '.') }}</td>
                    <td>{{ number_format($item->realisasi, 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h4>Catatan Seksi Akuntansi, Bidang BMD, dan Akuntansi BPKD</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Realisasi SP2D</th>
                </tr>
            </thead>
            <tbody>
                @foreach($catatan_seksi as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->bulan }}</td>
                    <td>{{ number_format($item->realisasi_sp2d, 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h4>Laporan SKPD</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Realisasi SP2D</th>
                    <th>Realisasi SPJ</th>
                    <th colspan="2" class="text-center">Saldo Kas</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>(SP2D - SPJ)</th>
                    <th>(Lap. Fungsional)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporan_skpd as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->bulan }}</td>
                    <td>{{ number_format($item->realisasi_sp2d, 2, ',', '.') }}</td>
                    <td>{{ number_format($item->realisasi_spj, 2, ',', '.') }}</td>
                    <td>{{ number_format($item->sp2d_minus_spj, 2, ',', '.') }}</td>
                    <td>{{ number_format($item->lap_fungsional, 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p>Demikian berita acara ini dibuat untuk digunakan sebagaimana mestinya.</p>

        <div class="row mt-5">
            <div class="col-md-6 text-center">
                <p>Menyetujui,</p>
                <p><strong>{{ $pejabat1['nama'] }}</strong></p>
                <p><em>{{ $pejabat1['jabatan'] }}</em></p>
                <p><strong>{{ $pejabat1['instansi'] }}</strong></p>
            </div>
            <div class="col-md-6 text-center">
                <p><strong>{{ $lokasi }}, {{ $tanggal_pembuatan }}</strong></p>
                <p><strong>{{ $pejabat2['nama'] }}</strong></p>
                <p><em>{{ $pejabat2['jabatan'] }}</em></p>
                <p><strong>{{ $pejabat2['instansi'] }}</strong></p>
            </div>
        </div>
    </div>
@endsection
