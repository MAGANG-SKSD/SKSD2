@extends('layouts.admin')

@section('title', __('Daftar Surat Perintah'))

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('Surat Perintah') }}</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-file-alt"></i>
                    {{ __('Daftar Surat Perintah') }}
                    <a href="{{ route('surat_perintah.create') }}" class="btn btn-primary float-right">{{ __('Tambah Surat Perintah') }}</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Judul') }}</th>
                                <th>{{ __('Tanggal') }}</th>
                                <th>{{ __('Aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suratPerintahs as $suratPerintah)
                                <tr>
                                    <td>{{ $suratPerintah->id }}</td>
                                    <td>{{ $suratPerintah->judul }}</td>
                                    <td>{{ $suratPerintah->tanggal }}</td>
                                    <td>
                                        <a href="{{ route('surat_perintah.show', $suratPerintah->id) }}" class="btn btn-info">{{ __('Lihat') }}</a>
                                        <a href="{{ route('surat_perintah.edit', $suratPerintah->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                                        <form action="{{ route('surat_perintah.destroy', $suratPerintah->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">{{ __('Hapus') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
