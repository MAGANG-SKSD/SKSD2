<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Cetak Surat Anggaran') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            color: #000;
        }

        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
        }

        .content {
            margin: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 8px;
            text-align: left;
            border: 1px solid #000;
        }

        .signature-section {
            margin-top: 50px;
            text-align: center;
        }

        .signature {
            margin-top: 80px;
        }

        .signature-line {
            display: inline-block;
            margin: 0 30px;
            text-align: center;
        }

        .signature-line p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Surat Anggaran</h2>
        <p>Tahun Anggaran: {{ $tahun_anggaran ?? 'Semua' }}</p>
    </div>

    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th>ID Anggaran</th>
                    <th>Tahun Anggaran</th>
                    <th>Nama Anggaran</th>
                    <th>Nilai Anggaran</th>
                    <th>Keterangan Lainnya</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anggaran as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->detail_norekening->nama }}</td>
                        <td>{{ number_format($item->nilai_anggaran, 2, ',', '.') }}</td>
                        <td>{{ $item->keterangan_lainnya }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="signature-section">
        <div class="signature-line">
            <p>Mengetahui,</p>
            <p>Kepala Desa</p>
            <div class="signature">
                <p>_______________________</p>
                <p>(Nama Kepala Desa)</p>
            </div>
        </div>
        <div class="signature-line">
            <p>Yang Membuat,</p>
            <p>Bendahara</p>
            <div class="signature">
                <p>_______________________</p>
                <p>(Nama Bendahara)</p>
            </div>
        </div>
    </div>

    <script>
        window.print(); // Cetak halaman secara otomatis ketika halaman terbuka
    </script>
</body>
</html>
