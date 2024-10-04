@extends('layouts.admin')

@section('title', __('Edit Surat'))

@section('content')
    <h2>{{ __('Edit Surat') }}</h2>

    <form action="{{ route('surat.update', $surat->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nomor_sp2d">{{ __('Nomor SP2D') }}</label>
            <input type="text" name="nomor_sp2d" class="form-control" value="{{ $surat->nomor_sp2d }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal_sp2d">{{ __('Tanggal SP2D') }}</label>
            <input type="date" name="tanggal_sp2d" class="form-control" value="{{ $surat->tanggal_sp2d }}" required>
        </div>

        <div class="form-group">
            <label for="nama_kegiatan">{{ __('Nama Kegiatan') }}</label>
            <input type="text" name="nama_kegiatan" class="form-control" value="{{ $surat->nama_kegiatan }}" required>
        </div>

        <div class="form-group">
            <label for="nilai_sp2d">{{ __('Nilai SP2D') }}</label>
            <input type="number" name="nilai_sp2d" class="form-control" value="{{ $surat->nilai_sp2d }}" required step="0.01">
        </div>

        <div class="form-group">
            <label for="kode_rekening">{{ __('Kode Rekening') }}</label>
            <input type="text" name="kode_rekening" class="form-control" value="{{ $surat->kode_rekening }}" required>
        </div>

        <div class="form-group">
            <label for="nama_penerima">{{ __('Nama Penerima') }}</label>
            <input type="text" name="nama_penerima" class="form-control" value="{{ $surat->nama_penerima }}" required>
        </div>

        <div class="form-group">
            <label for="bank_tujuan">{{ __('Bank Tujuan') }}</label>
            <input type="text" name="bank_tujuan" class="form-control" value="{{ $surat->bank_tujuan }}" required>
        </div>

        <div class="form-group">
            <label for="nomor_rekening_bank">{{ __('Nomor Rekening Bank') }}</label>
            <input type="text" name="nomor_rekening_bank" class="form-control" value="{{ $surat->nomor_rekening_bank }}" required>
        </div>

        <div class="form-group">
            <label for="uraian_penggunaan">{{ __('Uraian Penggunaan') }}</label>
            <textarea name="uraian_penggunaan" class="form-control">{{ $surat->uraian_penggunaan }}</textarea>
        </div>

        <div class="form-group">
            <label for="jenis_belanja">{{ __('Jenis Belanja') }}</label>
            <input type="text" name="jenis_belanja" class="form-control" value="{{ $surat->jenis_belanja }}">
        </div>

        <div class="form-group">
            <label for="tahun_anggaran">{{ __('Tahun Anggaran') }}</label>
            <input type="number" name="tahun_anggaran" class="form-control" value="{{ $surat->tahun_anggaran }}" required>
        </div>

        <div class="form-group">
            <label for="nama_bendahara">{{ __('Nama Bendahara') }}</label>
            <input type="text" name="nama_bendahara" class="form-control" value="{{ $surat->nama_bendahara }}" required>
        </div>

        <div class="form-group">
            <label for="status_verifikasi">{{ __('Status Verifikasi') }}</label>
            <select name="status_verifikasi" class="form-control" required>
                <option value="Diverifikasi" {{ $surat->status_verifikasi == 'Diverifikasi' ? 'selected' : '' }}>Diverifikasi</option>
                <option value="Disetujui" {{ $surat->status_verifikasi == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                <option value="Dalam Proses" {{ $surat->status_verifikasi == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </form>
@endsection
