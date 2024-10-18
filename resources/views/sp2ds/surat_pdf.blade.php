<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table, .table th, .table td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="text-center">
        <h3><strong>PEMERINTAH DESA</strong></h3>
        <h4><strong>KABUPATEN [Nama Kabupaten]</strong></h4>
        <p>Alamat: [Alamat Desa/Kecamatan]</p>
    </div>

    <p><strong>Nomor: </strong> {{ $anggaran->id }}/[Kode Desa]</p>
    <p><strong>Tanggal: </strong> {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
    <p><strong>Perihal: </strong> {{ $anggaran->detail_norekening->nama }}</p>
    <p><strong>Kepada Yth,</strong></p>
    <p><strong>{{ $anggaran->keterangan_lainnya }}</strong></p>
    <p>Di tempat</p>
    
    <br>
    <p>Dengan hormat,</p>
    <p>Sehubungan dengan {{ $anggaran->detail_norekening->nama }} yang telah diajukan, berikut ini adalah rincian anggaran:</p>
    
    <table class="table">
        <tr>
            <th>ID Anggaran</th>
            <td>{{ $anggaran->id }}</td>
        </tr>
        <tr>
            <th>Tahun Anggaran</th>
            <td>{{ $anggaran->tahun }}</td>
        </tr>
        <tr>
            <th>Nama Anggaran</th>
            <td>{{ $anggaran->detail_norekening->nama }}</td>
        </tr>
        <tr>
            <th>Nilai Anggaran</th>
            <td>{{ number_format($anggaran->nilai_anggaran, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Keterangan Lainnya</th>
            <td>{{ $anggaran->keterangan_lainnya }}</td>
        </tr>
    </table>
    
    <br><br>
    <div class="text-right">
        <p>Hormat kami,</p>
        <p><strong>Kepala Desa [Nama Desa]</strong></p>
        <br><br>
        <p>(Nama Kepala Desa)</p>
    </div>
</body>
</html>
