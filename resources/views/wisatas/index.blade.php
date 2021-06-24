@extends('layouts/app')

@section('title', 'Wisata')

@section('header')
<!-- Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<!-- AOS Animasi -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- custom CSS -->
<link rel="stylesheet" href="{{ asset('css/tempatwisata.css') }}" />
@endsection

@section('content')
<!-- judul -->
<div class="container judul">
    <div class="row">
        <div class="text-center">
            <h1>Nikmati Pesona Pariwisata Kota Madiun</h1>
        </div>
    </div>
</div>
<!-- Akhir Judul -->

<!-- pencarian -->
<div class="container pencarian mt-5">
    <div class="row justify-content-center">
        <form action="{{ route('wisatas.search') }}" class="col-md-10 d-flex" method="POST">
            @csrf
            @method('post')
            <input class="form-control form-control-lg-2" type="text"
                placeholder="Temukan tempat wisata yang ingin anda kunjungi di Madiun"
                aria-label="default input example" name="search" />
            <!-- Button cari -->
            <button type="submit" class="btn cta">Cari</button>
        </form>
    </div>
</div>
<!-- Akhir Pencarian -->

<!-- miniatur -->
<div class="container miniatur">
    <div class="row">
        <h3>Mau Melihat Miniatur Kota Madiun?</h3>
    </div>
    <div class="row">
        <div class="container custom-card mt-4">
            <div class="row justify-content-center">
                <div class="col-md-6 align-self-center gambar">
                    <img src="{{ '/images/peceland/pl1.jpg' }}" alt="peceland" />
                </div>
                <div class="col-md-5 peceland">
                    <h2>PeceLand</h2>
                    <p>
                        Tempat wisata yang mengusung konsep miniatur Kota Madiun ini sangat menarik untuk dikunjungi.
                        Didalamnya, anda dapat menemukan laboratorium pembuatan pecel, perkebunan, wahana permainan,
                        serta tempat ibadah dengan desain
                        yang estetik.
                    </p>
                    <a class="cta" href="wisatas/pecel-land">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Miniatur -->

<!-- Wisata Lainnya -->
<div class="container wisata-lainnya">
    <div class="row judul">
        <h3>Wisata Lainnya</h3>
    </div>
    <!-- Semua Card-card  Wisata -->
    <div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-between">
        @forelse ($wisatas as $wisata)
        <!-- Card wisata [1,1] -->
        <div class="col-md-4">
            <div class="card h-100 custom-card">
                <div class="card-body">
                    <img src="{{ asset('/storage/'. $wisata->gambar) }}" class="card-img-top" alt="psc" />
                    <h5 class="text-center mb-5 mt-5">{{ $wisata->nama }}</h5>
                    <div class="d-flex justify-content-evenly mb-3">
                        <a class="cta" href="{{ route('wisatas.show', $wisata->slug) }}">Lihat</a>
                        <a class="tombol" href="{{ $wisata->gmap }}">Lokasi</a>
                    </div>
                </div>
            </div>
        </div>
        <!--Akhir Card wisata [1,1] -->
        @empty
        <div class="belum-ada-data">
            <h4>Data tidak ditemukan</h4>
            <figure>
                <img style="width: 80%" src="{{ asset('images/no-data.jpg') }}" alt="no-data" />
                <figcaption style="font-size: 5pt"><a href="https://www.freepik.com/free-photos-vectors/data">Data
                        vector
                        created by stories -
                        www.freepik.com</a></figcaption>
            </figure>
        </div>
        @endforelse
    </div>
    <!-- Akhir semua card-card wisata -->
</div>
<!-- Akhir Wisata Lainnya -->

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
