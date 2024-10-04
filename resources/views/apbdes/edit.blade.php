@extends('layouts.admin')

@section('title', 'Edit Anggaran')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('apbdes.index') }}">APBDes</a></li>
        <li class="breadcrumb-item active">Edit Anggaran</li>
    </ul>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Edit Anggaran</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('anggaran.update', $anggaran->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="number" name="tahun" id="tahun" class="form-control" value="{{ $anggaran->tahun }}" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_norekening_id">Jenis Norekening</label>
                        <select name="jenis_norekening_id" id="jenis_norekening_id" class="form-control" required>
                            @foreach ($jenis_norekening as $jenis)
                                <option value="{{ $jenis->id }}" {{ $anggaran->detail_norekening->jenis_norekening_id == $jenis->id ? 'selected' : '' }}>
                                    {{ $jenis->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="detail_norekening_id">Detail Norekening</label>
                        <select name="detail_norekening_id" id="detail_norekening_id" class="form-control" required>
                            @foreach ($detail_norekening as $detail)
                                <option value="{{ $detail->id }}" {{ $anggaran->detail_norekening_id == $detail->id ? 'selected' : '' }}>
                                    {{ $detail->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keterangan_lainnya">Keterangan Lainnya</label>
                        <input type="text" name="keterangan_lainnya" id="keterangan_lainnya" class="form-control" value="{{ $anggaran->keterangan_lainnya }}">
                    </div>

                    <div class="form-group">
                        <label for="nilai_anggaran">Jumlah Anggaran</label>
                        <input type="number" name="nilai_anggaran" id="nilai_anggaran" class="form-control" value="{{ $anggaran->nilai_anggaran }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('apbdes.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Fetch Detail Norekening on Jenis Norekening change
        $('#jenis_norekening_id').change(function() {
            var jenis_id = $(this).val();
            if (jenis_id) {
                $.ajax({
                    url: "{{ route('apbdes.getDetailNorekening') }}",
                    type: "GET",
                    data: { jenis_id: jenis_id },
                    success: function(data) {
                        $('#detail_norekening_id').empty();
                        $('#detail_norekening_id').append('<option value="">Pilih Detail Norekening</option>');
                        $.each(data, function(key, value) {
                            $('#detail_norekening_id').append('<option value="' + value.id + '">' + value.nama + '</option>');
                        });
                    }
                });
            } else {
                $('#detail_norekening_id').empty();
                $('#detail_norekening_id').append('<option value="">Pilih Detail Norekening</option>');
            }
        });

        // If editing, trigger the change event to load current Detail Norekening
        @if (isset($anggaran))
            $('#jenis_norekening_id').trigger('change');
        @endif
    });
</script>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#jenis_norekening_id').change(function() {
            var jenis_id = $(this).val();
            if (jenis_id) {
                $.ajax({
                    url: "{{ route('apbdes.getDetailNorekening') }}",
                    type: "GET",
                    data: { jenis_id: jenis_id },
                    success: function(data) {
                        $('#detail_norekening_id').empty();
                        $('#detail_norekening_id').append('<option value="">Pilih Detail Norekening</option>');
                        $.each(data, function(key, value) {
                            $('#detail_norekening_id').append('<option value="' + value.id + '">' + value.nama + '</option>');
                        });
                    }
                });
            } else {
                $('#detail_norekening_id').empty();
                $('#detail_norekening_id').append('<option value="">Pilih Detail Norekening</option>');
            }
        });
    });
</script>
@endpush
