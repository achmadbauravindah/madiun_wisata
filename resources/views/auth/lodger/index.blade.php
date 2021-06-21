@extends('layouts.lodger.app')

@section('title', 'Lodger')

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
        <div class="kiri col-md-4">
            <div class="custom-card p-3 pb-1">
                <h6>Indah Yunita</h6>
                <p>Lodger</p>
            </div>
            <div class="list-group custom-card">
                <a href="#" class="list-group-item list-group-item-action list-group-item-dark" aria-current="true"><i
                        class="bi bi-house-fill"></i> Penginapan Saya </a>
                <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-gear-fill"></i> Pengaturan
                    Akun</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-shield-lock-fill"></i> Ganti
                    Password</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="bi bi-box-arrow-right"></i>
                    Logout</a>
            </div>
        </div>

        <div class="kanan col-md-8">
            <div class="custom-card p-5">
                <div class="row">
                    <!-- Pencarian -->
                    <form class="col-md-12 d-flex align-items-center pencarian" method="POST">
                        <input class="form-control form-control-lg-2" type="text" placeholder="Temukan Penginapan"
                            aria-label="default input example" />
                        <!-- Button cari -->
                        <button type="button" class="btn cta">Cari</button>
                    </form>
                    <!-- Akhir Pencarian  -->
                </div>

                <a class="cta-sm mt-3" href="tambahpenginapan.html">Tambah Penginapan</a>

                <div class="belum-ada-data">
                    <!-- JIKA BELUM ADA DATA -->
                    <figure>
                        <img style="width: 80%" src="{{ asset('images/no-data.jpg') }}" alt="no-data" />
                        <figcaption style="font-size: 5pt"><a
                                href="https://www.freepik.com/free-photos-vectors/data">Data vector created by stories -
                                www.freepik.com</a></figcaption>
                    </figure>
                </div>

                <!-- JIKA SUDAH ADA DATA -->

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Penginapan</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Login Homestay</td>
                            <td>Jl Musi No 38 Madiun</td>
                            <td>Sudah di-acc</td>
                            <td><a href="viewpenginapan.html">view</a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Famous Homestay</td>
                            <td>Jl Widuri 14 Madiun</td>
                            <td>Belum di-acc</td>
                            <td><a href="viewpenginapan.html">view</a></td>
                        </tr>
                    </tbody>
                </table>
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
