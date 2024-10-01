@extends('layouts.admin')
@section('title', __('Tambah Anggaran'))
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('apbdes.anggaran.index') }}">{{ __('APBDes') }}</a></li>
        <li class="breadcrumb-item">{{ __('Tambah Anggaran') }}</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2>{{ __('Tambah Anggaran') }}</h2>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('apbdes.anggaran.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tahun">{{ __('Tahun') }}</label>
                            <input type="number" name="tahun" id="tahun" class="form-control" required>
                        </div>

                        <!-- Jenis No Rekening -->
                        <div class="form-group">
                            <label for="jenis_norekening_id">{{ __('Jenis No Rekening') }}</label>
                            <select name="jenis_norekening_id" id="jenis_norekening_id" class="form-control" required>
                                <option value="">{{ __('Pilih Jenis No Rekening') }}</option>
                                @foreach($jenis_norekening as $jn)
                                    <option value="{{ $jn->id }}">{{ $jn->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Kelompok No Rekening -->
                        <div class="form-group">
                            <label for="kelompok_norekening_id">{{ __('Kelompok No Rekening') }}</label>
                            <select name="kelompok_norekening_id" id="kelompok_norekening_id" class="form-control" required>
                                <option value="">{{ __('Pilih Kelompok No Rekening') }}</option>
                            </select>
                        </div>

                        <!-- Detail No Rekening -->
                        <div class="form-group">
                            <label for="detail_norekening_id">{{ __('Detail No Rekening') }}</label>
                            <select name="detail_norekening_id" id="detail_norekening_id" class="form-control" required>
                                <option value="">{{ __('Pilih Detail No Rekening') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nilai_anggaran">{{ __('Nilai Anggaran') }}</label>
                            <input type="number" name="nilai_anggaran" id="nilai_anggaran" class="form-control" required min="0">
                        </div>

                        <div class="form-group">
                            <label for="keterangan_lainnya">{{ __('Keterangan Lainnya') }}</label>
                            <textarea name="keterangan_lainnya" id="keterangan_lainnya" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Ketika Jenis No Rekening berubah
        $('#jenis_norekening_id').on('change', function() {
            var jenisId = $(this).val();
            if (jenisId) {
                $.ajax({
                    url: '/kelompok-norekening/' + jenisId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#kelompok_norekening_id').empty();
                        $('#kelompok_norekening_id').append('<option value="">{{ __("Pilih Kelompok No Rekening") }}</option>');
                        $.each(data, function(key, value) {
                            $('#kelompok_norekening_id').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                        });
                    },
                    error: function() {
                        alert('Gagal mengambil data kelompok norekening');
                    }
                });
            } else {
                $('#kelompok_norekening_id').empty();
            }
        });

        // Ketika Kelompok No Rekening berubah
        $('#kelompok_norekening_id').on('change', function() {
            var kelompokId = $(this).val();
            if (kelompokId) {
                $.ajax({
                    url: '/detail-norekening/' + kelompokId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#detail_norekening_id').empty();
                        $('#detail_norekening_id').append('<option value="">{{ __("Pilih Detail No Rekening") }}</option>');
                        $.each(data, function(key, value) {
                            $('#detail_norekening_id').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                        });
                    },
                    error: function() {
                        alert('Gagal mengambil data detail norekening');
                    }
                });
            } else {
                $('#detail_norekening_id').empty();
            }
        });
    });
</script>
@endpush
