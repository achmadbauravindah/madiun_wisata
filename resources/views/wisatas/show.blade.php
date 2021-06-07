@extends('layouts/app')

@section('title', $wisata->nama)

@section('header')
<!-- Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<!-- AOS Animasi -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- custom CSS -->
<link rel="stylesheet" href="{{ asset('css/detailwisata.css') }}" />
@endsection

@section('content')

<!--Artikel wisata  -->
<div class="container custom-card artikel">
    <h2 class="text-center">{{ $wisata->nama }}</h2>
    <img class="mx-auto d-block" src="{{ asset('/storage/'.$wisata->gambar) }}" alt="sumber wangi" />
    <p class="text-center">
        {{ $wisata->deskripsi }}
    </p>
    <div class="d-flex justify-content-center">
        <a class="cta" href="{{ $wisata->gmap }}">Lokasi</a>
    </div>
</div>
<!-- Akhir Artikel Wisata -->

<!-- Galeri Foto -->
<div class="container galeri">
    <div class="row judul">
        <h3>Galeri Foto</h3>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-between">
        @foreach ($galeriwisatas as $galeriwisata)
        <!-- foto 1 -->
        <div class="col-md-4">
            <img src="{{ asset('/storage/'. $galeriwisata->galeri) }}" alt="sumber wangi" />
        </div>
        @endforeach
    </div>
</div>

<!-- Akhir Galeri Foto -->

<!-- Footer -->
<footer class="background">
    <p>MadiunWisata | 2021</p>
</footer>
<!-- Akhir Footer -->

@endsection
