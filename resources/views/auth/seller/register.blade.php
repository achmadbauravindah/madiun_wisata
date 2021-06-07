@extends('layouts/app')

@section('title', 'Login')

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
    <div class="container">
        <div class="custom-card p-3">
            <h3 class="judul text-center">Pendaftaran Penjual Kios</h3>
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" />
                </div>
                <div class="col-md-6">
                    <label for="NIK" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="NIK" />
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Alamat</label>
                    <textarea name="address" id="address" cols="100%" rows="5" class="form-control"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                    <select id="jeniskelamin" class="form-select">
                        <option selected>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="name" class="form-label">No WA</label>
                    <input type="text" class="form-control" id="name" />
                </div>
                <div class="col-md-4">
                    <label for="NIK" class="form-label">Email</label>
                    <input type="text" class="form-control" id="NIK" />
                </div>
                <div class="col-12">
                    <label for="formFile" class="form-label">Scan KTP (jpg)</label>
                    <input class="form-control" type="file" id="formFile" />
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" />
                </div>
                <div class="col-md-6">
                    <label for="konfirmasi-password" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="konfirmasi-password" />
                </div>
                <div class="col-12">
                    <button type="submit" class="btn cta">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</main>

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
