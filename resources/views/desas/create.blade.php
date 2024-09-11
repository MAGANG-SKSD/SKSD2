@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Desa</h1>

        <form action="{{ route('desas.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_desa">Nama Desa:</label>
                <input type="text" name="nama_desa" id="nama_desa" class="form-control" value="{{ old('nama_desa') }}" required>
            </div>

            <div class="form-group">
                <label for="alamat_desa">Alamat Desa:</label>
                <input type="text" name="alamat_desa" id="alamat_desa" class="form-control" value="{{ old('alamat_desa') }}" required>
            </div>

            <div class="form-group">
                <label for="kode_pos">Kode Pos:</label>
                <input type="number" name="kode_pos" id="kode_pos" class="form-control" value="{{ old('kode_pos') }}" required>
            </div>

            <div class="form-group">
                <label for="telepon">Telepon:</label>
                <input type="text" name="telepon" id="telepon" class="form-control" value="{{ old('telepon') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
