@extends('layouts.seller.app')

@section('title', 'Daftar Kios')

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

    <div class="row justify-content-between">

        {{-- SIDEBAR --}}
        @include('layouts.seller.sidebar')

        <div class="kanan col-md-8">
            <div class="custom-card p-5">
                <div class="d-flex justify-content-end">
                    <a class="cta-sm" href="{{ route('seller') }}">Back</a>
                </div>
                <form class="form-crud row g-3" method="post" action="{{ route('kios.store') }}">
                    @csrf
                    @method('post')
                    <div class="col-md-12">
                        <label for="nama_kios" class="form-label">Nama Kios</label>
                        <input type="text" class="form-control" id="nama_kios" name="nama_kios" />
                        @error('nama_kios')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="nama_menu" class="form-label">Menu</label>
                        <input type="text" class="form-control" id="nama_menu" name="nama_menu" />
                        @error('nama_menu')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" />
                        @error('harga')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="jenis_menu" class="form-label">Jenis </label>
                        <select id="jenis_menu" class="form-select" name="jenis_menu">
                            <option value="1">Makanan</option>
                            <option value="0">Minuman</option>
                        </select>
                        @error('jenis_menu')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <p>*Daftarkan menu andalan anda</p>

                    <div class="col-12">
                        <button type="submit" class="btn cta-sm">Submit</button>
                    </div>
                </form>
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
