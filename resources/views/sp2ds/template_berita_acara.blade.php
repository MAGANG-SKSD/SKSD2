<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Berita Acara Rekonsiliasi</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        h2, h4 { text-align: center; }
    </style>
</head>
<body>
    <h2>BERITA ACARA REKONSILIASI</h2>
    <p>Pada hari ini, <strong>{{ $hari }}</strong>, tanggal <strong>{{ $tanggal }}</strong>, bulan <strong>{{ $bulan }}</strong>, tahun <strong>{{ $tahun }}</strong>, bertempat di <strong>{{ $lokasi }}</strong>, telah dilakukan rekonsiliasi laporan.</p>

    <h4>Data Pejabat</h4>
    <p>1. {{ $pejabat1['nama'] }}, {{ $pejabat1['jabatan'] }}, {{ $pejabat1['instansi'] }}</p>
    <p>2. {{ $pejabat2['nama'] }}, {{ $pejabat2['jabatan'] }}, {{ $pejabat2['instansi'] }}</p>

    <h4>Pendapatan</h4>
    <table>
        <thead>
            <tr>
                <th>Jenis</th>
                <th>Anggaran</th>
                <th>Realisasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendapatan as $item)
                <tr>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ number_format($item->anggaran, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->realisasi, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Belanja</h4>
    <table>
        <thead>
            <tr>
                <th>Jenis</th>
                <th>Anggaran</th>
                <th>Realisasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($belanja as $item)
                <tr>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ number_format($item->anggaran, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->realisasi, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Laporan SKPD</h4>
    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Nama SKPD</th>
                <th>Jumlah Anggaran</th>
                <th>Jumlah Realisasi</th>
                <th>Realisasi SP2D</th>
                <th>Realisasi SPJ</th>
                <th>Saldo Kas</th>
                <th>SP2D - SPJ</th>
                <th>Lap. Fungsional</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan_skpd as $item)
                <tr>
                    <td>{{ $item->bulan }}</td>
                    <td>{{ $item->nama_skpd }}</td>
                    <td>{{ number_format($item->jumlah_anggaran, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->jumlah_realisasi, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->realisasi_sp2d, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->realisasi_spj, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->saldo_kas, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->sp2d_minus_spj, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->lap_fungsional, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Catatan Seksi Akuntansi</h4>
    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Realisasi SP2D</th>
            </tr>
        </thead>
        <tbody>
            @foreach($catatan_seksi as $item)
                <tr>
                    <td>{{ $item->bulan }}</td>
                    <td>{{ number_format($item->realisasi_sp2d, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
