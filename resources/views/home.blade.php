@extends('layouts.app')

@section('title', "MadiunWisata")

@section('header')
<!-- Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<!-- AOS Animasi -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- custom CSS -->
<link rel="stylesheet" href="{{ asset('css/landpage.css') }}" />
@endsection

@section('content')
<!-- Hero -->
<div class="container hero">
    <div class="row">
        <div class="col-md-6 align-self-center welcome" data-aos="fade-up" data-aos-duration="1500">
            <h1>Selamat Datang di Madiun Wisata</h1>
            <p>Nikmati pesona ikon-ikon wisata terbaru di Kota Madiun bersama keluarga dan kerabat anda. Jangan lewatkan
                spot-spot indah di Kota Madiun yang menarik untuk dikunjungi.</p>
            <a class="cta" href="{{ route('wisatas') }}">Explore Sekarang</a>
        </div>
        <div class="col-md-6 gambar" data-aos="fade-left" data-aos-delay="150" data-aos-duration="2000">
            <img src="{{ asset('images/ornamen/lpatas.png') }}" alt="madiun" />
        </div>
    </div>
</div>
<!-- Akhir Hero -->

<!-- Penginapan -->
<div class="background">
    <div class="container penginapan">
        <div class="row">
            <div class="col-md-6 gambar" data-aos="zoom-in-up" data-aos-delay="200" data-aos-duration="1500">
                <img src="{{ asset('images/penginapan/penghome.png') }}" alt="penginapan" />
            </div>
            <div class="col-md-6 tulisan" data-aos="fade-up" data-aos-delay="400" data-aos-duration="3000">
                <h1>Anda Warga Madiun dan Memiliki Usaha Penginapan/Home Stay?</h1>
                <p>Yuk daftarkan penginapan anda di Website Madiun Wisata dan dapatkan lebih banyak customer setelah
                    pasang iklan.</p>
                <a class="cta" href="{{ route('showLodgerRegisterForm') }}">Daftarkan Sekarang</a>
                <a class="tombol" href="{{ route('showLodgerLoginForm') }}">Login</a>
            </div>
        </div>
    </div>
</div>

<!-- Akhir Penginapan -->

<!-- Yuk berwisata -->
<div class="container berwisata">
    <div class="row mb-4">
        <div class="align-self-center text-center">
            <h1 data-aos="fade-up" data-aos-duration="3000">Yuk Mulai Berwisata</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card h-100 custom-card" data-aos="flip-right" data-aos-duration="3000" data-aos-delay="200">
                <img src="{{ asset('images/home/1.jpg') }}" alt="penginapan" />
                <div class="card-body">
                    <p class="text-center">Temukan tempat menginap yang sesuai dengan kebutuhan anda di sekitar Kota
                        Madiun</p>
                    <a class="panah d-flex justify-content-center" href="{{ route('penginapans') }}"><i
                            class="bi bi-arrow-right-circle-fill center-block"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 custom-card" data-aos="flip-right" data-aos-delay="350" data-aos-duration="3000">
                <img src="{{ asset('images/home/2.jpg') }}" alt="penginapan" />
                <div class="card-body">
                    <p class="text-center">Nikmati kuliner-kuliner khas yang tersebar di Lapak UMKM Kota Madiun</p>
                    <a class="panah d-flex justify-content-center" href="{{ route('lapakumkms') }}"><i
                            class="bi bi-arrow-right-circle-fill center-block"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 custom-card" data-aos="flip-right" data-aos-delay="450" data-aos-duration="3000">
                <img src="{{ asset('images/home/3.jpg') }}" alt="penginapan" />
                <div class="card-body">
                    <p class="text-center">Jelajahi indahnya Kota Madiun menggunakan Bus Wisata Mabour (Madiun Bus On
                        Tour)</p>
                    <a class="panah d-flex justify-content-center" href="{{ route('mabours') }}"><i
                            class="bi bi-arrow-right-circle-fill center-block"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Yuk berwisata -->

<!-- Footer -->
<footer class="background">
    <p>MadiunWisata | 2021</p>
</footer>
<!-- Akhir Footer -->
@endsection

@section('script')
<!-- AOS Animasi -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endsection
