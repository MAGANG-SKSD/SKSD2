@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/kantor.jpg') }}" class="d-block w-100" alt="Kantor Desa Rowosari">
                </div>
            </div>
        </div>

        <!-- Button Dokar -->
        <div class="mt-3 text-center">
            <a href="#" class="btn btn-danger">
                <i class="fas fa-external-link-alt"></i> Klik Disini Untuk Mengunjungi Dashboard Dokar
            </a>
        </div>
    </div>
</div>
@endsection
