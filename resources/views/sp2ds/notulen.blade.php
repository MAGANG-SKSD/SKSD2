@extends('layouts.admin')

@section('title', __('Surat Perintah Membayar'))

@section('content')
    <h2 class="text-center">SUBSIDI DAN TRANSFER</h2>
    <h3 class="text-center">SURAT PERINTAH MEMBAYAR</h3>

    <table class="table table-bordered">
        <tr>
            <td>Tanggal</td>
            <td>29-09-2006</td>
            <td>Nomor</td>
            <td>00002/IX/2006</td>
        </tr>
        <tr>
            <td colspan="4">
                Kuasa Bendahara Umum Negara, KPPN YOGYAKARTA (030) <br>
                Agar melakukan pembayaran sejumlah Rp. 572.400.000,- <br>
                ***LIMA RATUS TUJUH PULUH DUA JUTA EMPAT RATUS RIBU RUPIAH***
            </td>
        </tr>
        <tr>
            <td>Cara Bayar</td>
            <td>2 - Giro Bank</td>
            <td>Tahun Anggaran</td>
            <td>2006</td>
        </tr>
        <tr>
            <td colspan="4">Dasar Pembayaran</td>
        </tr>
        <tr>
            <td colspan="4">
                KEPPRES No.42 TAHUN 2002(01), DIPANO. 0026.1/062-03.0/-/2006 <br>
                TANGGAL 31-12-2005 <br>
                Klasifikasi Belanja S811, Fungsi, Sub Fungsi, Program 01.03.0119 <br>
                Satker 957782, Unit Organisasi 062.03, Lokasi 04.01 <br>
                DINAS PERUMAHAN DAN PRASARANA WILAYAH PROPINSI D.I.Y <br>
                Jenis Pembayaran: 1 - Pengeluaran Anggaran <br>
                Sifat Pembayaran: 4 - Pembayaran Langsung (LS) <br>
                Sumber Dana / Cara Penarikan: 01.0 RM / RM
            </td>
        </tr>
    </table>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="4">PENGELUARAN</th>
                <th colspan="2">POTONGAN</th>
            </tr>
            <tr>
                <th>Keg/Sub.Keg</th>
                <th>MAK</th>
                <th>Jumlah Uang</th>
                <th>Lemb/Unit/Lok/MAP</th>
                <th>Jumlah Uang</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2684.0504</td>
                <td>S81113</td>
                <td>Rp. 572.400.000,-</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">Jumlah Pengeluaran</td>
                <td colspan="3">Rp. 572.400.000,-</td>
            </tr>
            <tr>
                <td colspan="3">Jumlah Potongan</td>
                <td colspan="3">Rp. 0,-</td>
            </tr>
        </tbody>
    </table>

    <p><strong>Kepada:</strong> Kelompok Masyarakat Kabupaten Bantul terlampir</p>
    <p><strong>NPWP:</strong> 00.000.000.0-541.000</p>
    <p><strong>Nomor Rek:</strong> TERLAMPIR</p>
    <p><strong>Bank/Pos:</strong> BRI BANTUL UNIT PUNDONG</p>
    <p><strong>Yaitu:</strong> Belanja Lain-lain untuk Bantuan Langsung Masyarakat Perumahan</p>

    <div class="text-right">
        <p>YOGYAKARTA, 29 SEPTEMBER 2006</p>
        <p>An. MENTERI ...</p>
        <p>Kuasa Pengguna Anggaran</p>
        <p>PENANDA TANGAN SPM</p>
        <p>Drs. BAMBANG WISNU H.<br>NIP: 490026517</p>
    </div>
@endsection
