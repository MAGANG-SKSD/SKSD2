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
                        <td>
                            <span id="formatted-amount">{{ number_format($anggaran->nilai_anggaran, 2, ',', '.') }}</span>
                            (Terbilang: <span id="terbilang-text">...</span>)
                        </td>
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
                    @if($anggaran->detail_norekening) <!-- Cek jika relasi detail_norekening ada -->
                        <tr>
                            <td>1</td>
                            <td>{{ $anggaran->detail_norekening->id ?? '-' }}</td> <!-- Mengisi Kode Rekening dengan ID detail_norekening -->
                            <td>{{ $anggaran->keterangan_lainnya ?? '-' }}</td> <!-- Mengisi uraian dengan keterangan lainnya -->
                            <td>{{ isset($anggaran->nilai_anggaran) ? number_format($anggaran->nilai_anggaran, 2, ',', '.') : '-' }}</td> <!-- Mengisi jumlah dengan nilai anggaran -->
                        </tr>
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
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            var jumlahUang = {{ $anggaran->nilai_anggaran }}; // Pastikan ini adalah angka yang tepat
            $.ajax({
                url: "{{ route('terbilang.convert') }}",
                type: "POST",
                data: {
                    number: jumlahUang,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    $('#terbilang-text').text(response.terbilang);
                },
                error: function () {
                    $('#terbilang-text').text('Terjadi kesalahan.');
                }
            });
        });
    </script>
@endsection
