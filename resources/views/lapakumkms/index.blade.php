@extends('layouts/app')

@section('title', 'Wisata')

@section('header')
<!-- Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<!-- AOS Animasi -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- custom CSS -->
<link rel="stylesheet" href="{{ asset('css/lapakumkm.css') }}" />
@endsection

@section('content')
<main class="atas">
    <!-- Daftar keseluruhan Lapak -->
    <div class="container lapak">
        <h2 class="judul">Daftar Lapak</h2>
        <div class="row justify-content-between">
            <div class="kiri col-md-8">
                @foreach ($lapakumkms as $lapakumkm)
                <!-- Card per lapak -->
                <div class="card mb-3 custom-card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img class="card-img" src="{{ asset('/storage/' . $lapakumkm->foto) }}" alt="lapak"
                                style="height: 100%" />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $lapakumkm->nama }}</h5>
                                <p class="card-text">{{ $lapakumkm->lokasi }}</p>
                                <div class="d-flex justify-content-end">
                                    <a class="tombol" href="{{ $lapakumkm->gmap }}">Maps</a>
                                    <a class="cta" href="{{ route('lapakumkms.show', $lapakumkm->slug) }}">Lihat
                                        Kios</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir card per lapak -->
                @endforeach
            </div>
            <!-- Akhir daftar keseluruhan lapak -->

            <!-- register dan login -->
            <div class="kanan col-md-4">
                <div class="custom-sidebar">
                    <h6 class="text-center judul">Ingin Mendaftarkan Kios anda di lapak UMKM?</h6>
                    <p style="line-height: 30px; font-size: 16px">
                        Lapak Kelurahan UMKM madiun terbuka bagi warga Madiun yang ingin memulai usaha makanan dan
                        minuman. Setiap warga dapat mendaftarkan kiosnya di Lapak UMKM sesuai dengan Kelurahannya
                        masing-masing
                    </p>
                    <div class="dflex justify-content-evenly">
                        <a href="{{ route('seller.register') }}" class="cta">Daftar</a>
                        <a href="{{ route('seller.login') }}" class="tombol">Login</a>
                    </div>
                    <hr style="color: #b2bec3" />
                    <a href="" class="linkhijau text-center">Login Pengelola Lapak</a>
                </div>
            </div>
        </div>
    </div>
</main>

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
