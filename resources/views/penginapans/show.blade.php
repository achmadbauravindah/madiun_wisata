@extends('layouts/app')

@section('title', $penginapan->nama)

@section('header')
<!-- Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<!-- AOS Animasi -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- custom CSS -->
<link rel="stylesheet" href="{{ asset('css/detailpenginapan.css') }}" />
@endsection

@section('content')
<!-- Judul -->
<div class="container judul">
    <h2 class="text-center">{{ $penginapan->nama }}</h2>
</div>

<!-- Akhir judul -->

<!-- Carousel penginapan (foto) -->
<div class="container">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- Foto Tampak depan -->
                <img src="{{ asset('/storage/'. $penginapan->imgdepan) }}" class="d-block w-100" alt="loginhs depan" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Tampak Depan</h5>
                </div>
            </div>
            <div class="carousel-item">
                <!-- Foto Kamar -->
                <img src="{{ asset('/storage/'. $penginapan->imgkamar) }}" class="d-block w-100" alt="kamar" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Kamar</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/storage/'. $penginapan->imgwc) }}" class="d-block w-100" alt="kamarmandi" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Kamar Mandi</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Akhir Carousel penginapan (foto) -->
<!-- Content -->
<div class="container content">
    <div class="row justify-content-between">
        <div class="kiri col-md-6">
            <div class="custom-card">
                <h5>Lokasi</h5>
                <p>{{ $penginapan->lokasi }}</p>
            </div>
            <div class="custom-card">
                <h5>Harga</h5>
                <p>{{ $penginapan->harga }}</p>
            </div>
        </div>
        <div class="kanan col-md-6">
            <div class="custom-card">
                <h5>Fasilitas</h5>
                <p>{{ $penginapan->spesifikasi }}</p>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-lg-start">
        <a class="cta" href="{{ $redirectWA }}">Booking</a>
    </div>
</div>
<!-- Akhir content -->

<!-- Footer -->
<footer class="background">
    <p>MadiunWisata | 2021</p>
</footer>
<!-- Akhir Footer -->

@endsection()

@section('script')
<!-- AOS Animasi -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endsection
