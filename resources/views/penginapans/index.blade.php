@extends('layouts/app')

@section('title', 'Wisata')

@section('header')
<!-- Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<!-- AOS Animasi -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- custom CSS -->
<link rel="stylesheet" href="CSS/penginapan.css" />
@endsection
@section('content')
@if (session('success'))
<div class="alert alert-success mt-5">
    {{ session('success') }}
</div>
@endif
<!-- Bagian Atas -->
<div class="container atas">
    <div class="row">
        <!-- Penginapan Atas kiri -->
        <div class="col-md-6">
            <div class="custom-card p-md-4">
                <h6>Anda memiliki penginapan di Kota Madiun?</h6>
                <a class="linkhijau" href="{{ route('penginapans.create') }}">Promosikan</a>
                <a class="linkabu ms-3" href="">Login</a>
            </div>
        </div>
        <!-- Akhir Penginapan Atas kiri -->

        <!-- Pencarian Atas kanan -->
        <form class="col-md-6 d-flex align-items-center pencarian" method="POST">
            <input class="form-control form-control-lg-2" type="text" placeholder="Temukan Penginapan di Madiun"
                aria-label="default input example" />
            <!-- Button cari -->
            <button type="button" class="btn cta">Cari</button>
        </form>
        <!-- Akhir Pencarian Atas Kanan -->
    </div>
</div>
<!-- Akhir Bagian Atas -->

<!-- Semua Penginapan -->
<div class="container semua-penginapan">
    <div class="row judul">
        <h3>Semua Penginapan</h3>
    </div>
    <!-- Semua Card-card  penginapan -->
    <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-between">

        @forelse ($penginapans as $penginapan)
        <!-- Card wisata [1,2] -->
        <div class="col-md-4">
            <div class="card h-100 custom-card">
                <div class="card-body">
                    <img src="{{ asset($penginapan->imgdepan) }}" class="card-img-top" alt="psc" />
                    <h5 class="text-center mb-5 mt-5">{{ $penginapan->nama }}</h5>
                    <p class="text-center">{{ $penginapan->lokasi }}</p>
                    <div class="d-flex justify-content-between mt-sm-5">
                        <h5 class="align-self-center">{{ $penginapan->harga }}</h5>
                        <a class="cta" href="{{ route('penginapans.show', $penginapan->slug) }}">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        Tidak ada data
        @endforelse
    </div>
    <!-- Akhir semua card-card penginapan -->
</div>
<!-- Akhir Semua Penginapan -->

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
