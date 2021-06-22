@extends('layouts.seller.app')

@section('title', 'Seller')

@section('header')
<!-- Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<!-- AOS Animasi -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- custom CSS -->
<link rel="stylesheet" href="{{ asset('css/crudpage.css') }}" />
@endsection

@section('content')

<!-- Content -->
<div class="container content">

    @if(session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger mt-4">
        {{ session()->get('error') }}
    </div>
    @endif

    <div class="row justify-content-between">

        {{-- SIDEBAR --}}
        @include('layouts.seller.sidebar')


        <div class="kanan col-md-8">
            <div class="custom-card p-5">
                <h5 class="mb-3">Kios Saya</h5>

                @if ($kios)
                <!-- JIKA SUDAH ADA DATA -->
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img class="card-img" src="{{ asset('images/kios.jpg') }}" alt="lapak"
                                style="height: 100%" />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $kios->nama }}</h5>
                                <div class="status">
                                    @if ($kios->agree == 2)
                                    <span class="badge bg-info text-dark">Disetujui</span>
                                    @elseif ($kios->agree == 1)
                                    <span class="badge bg-warning">Menunggu Persetujuan</span>
                                    @else
                                    <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-end align-self-end">
                                    <a class="cta-sm" href="{{ route('kios.edit', $kios->slug) }}">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <!-- JIKA BELUM ADA DATA -->
                <div class="d-flex justify-content-end">
                    <a class="cta-sm" href="{{ route('kios.create') }}">Daftarkan Kios</a>
                </div>

                <!-- JIKA BELUM ADA DATA -->
                <div class="belum-ada-data">
                    <figure>
                        <img style="width: 80%" src="{{ asset('images/no-data.jpg') }}" alt="no-data" />
                        <figcaption style="font-size: 5pt"><a
                                href="https://www.freepik.com/free-photos-vectors/data">Data vector
                                created by stories -
                                www.freepik.com</a></figcaption>
                    </figure>
                </div>
                @endif


            </div>
        </div>
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
