@extends('layouts.admin')

@section('title', __('Detail Surat'))

@section('content')
    <h2>Detail Surat</h2>

    <div class="card">
        <div class="card-body">
            <!-- Bagian Header Surat -->
            <div class="text-center mb-4">
                <h3><strong>PEMERINTAH DESA</strong></h3>
                <h4><strong>KABUPATEN [Nama Kabupaten]</strong></h4>
                <p>Alamat: [Alamat Desa/Kecamatan]</p>
            </div>

            <!-- Bagian Isi Surat -->
            <div>
                <!-- Kolom 1 -->
                <h5><strong>Kolom 1</strong></h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Nomor SPM</th>
                        <td>{{ $anggaran->nomor_spm }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ $anggaran->tanggal_spm }}</td>
                    </tr>
                    <tr>
                        <th>SKPD</th>
                        <td>{{ $anggaran->skpd }}</td>
                    </tr>
                    <tr>
                        <th>Dari</th>
                        <td>Kuasa Bendahara Umum Daerah (Kuasa BUD)</td>
                    </tr>
                    <tr>
                        <th>Tahun Anggaran</th>
                        <td>{{ $anggaran->tahun }}</td>
                    </tr>
                    <tr>
                        <th>Bank/Pos</th>
                        <td>{{ $anggaran->bank }}</td>
                    </tr>
                    <tr>
                        <th>Rekening Nomor</th>
                        <td>{{ $anggaran->rekening_kas_umum_daerah }}</td>
                    </tr>
                    <tr>
                        <th>Uang Sejumlah</th>
                        <td>{{ number_format($anggaran->jumlah_uang, 2, ',', '.') }}</td>
                    </tr>
                </table>

                <!-- Kolom 2 -->
                <h5><strong>Kolom 2 (Khusus SPP-UP/GU/TU)</strong></h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Kepada</th>
                        <td>{{ $anggaran->bendahara }}</td>
                    </tr>
                    <tr>
                        <th>NPWP</th>
                        <td>{{ $anggaran->npwp_bendahara }}</td>
                    </tr>
                    <tr>
                        <th>Kode Rekening Bank</th>
                        <td>{{ $anggaran->rekening_bendahara }}</td>
                    </tr>
                    <tr>
                        <th>Bank/Pos</th>
                        <td>{{ $anggaran->bank_bendahara }}</td>
                    </tr>
                    <tr>
                        <th>Keperluan</th>
                        <td>{{ $anggaran->keperluan }}</td>
                    </tr>
                </table>

                <h5><strong>Kolom 2 (Khusus SPP LS Gaji/Barang & Jasa Pihak Ketiga)</strong></h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Kepada</th>
                        <td>{{ $anggaran->pihak_ketiga }}</td>
                    </tr>
                    <tr>
                        <th>NPWP</th>
                        <td>{{ $anggaran->npwp_pihak_ketiga }}</td>
                    </tr>
                    <tr>
                        <th>Kode Rekening Bank</th>
                        <td>{{ $anggaran->rekening_pihak_ketiga }}</td>
                    </tr>
                    <tr>
                        <th>Bank/Pos</th>
                        <td>{{ $anggaran->bank_pihak_ketiga }}</td>
                    </tr>
                    <tr>
                        <th>Keperluan</th>
                        <td>{{ $anggaran->keperluan_pihak_ketiga }}</td>
                    </tr>
                </table>

                <!-- Kolom 3 -->
<h5><strong>Kolom 3</strong></h5>
<table class="table table-bordered">
    <tr>
        <th>Nomor</th>
        <th>Kode Rekening</th>
        <th>Uraian</th>
        <th>Jumlah</th>
    </tr>
    @if(!empty($anggaran->detail_rekening) && $anggaran->detail_rekening->count() > 0)
        @foreach($anggaran->detail_rekening as $index => $detail)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $detail->kode_rekening }}</td>
                <td>{{ $detail->uraian }}</td>
                <td>{{ number_format($detail->jumlah, 2, ',', '.') }}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="4" class="text-center">Tidak ada data detail rekening.</td>
        </tr>
    @endif
</table>

            <!-- Tombol Kembali & Download PDF -->
            <div class="mt-4">
                <a href="{{ route('surat.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('surat.download', $anggaran->id) }}" class="btn btn-primary">
                    <i class="fa fa-download"></i> Download PDF
                </a>
            </div>
        </div>
    </div>
@endsection
