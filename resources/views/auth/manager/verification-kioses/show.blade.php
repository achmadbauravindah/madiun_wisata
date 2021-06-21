@extends('layouts.lodger.app')

@section('title', 'Manager')

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
        @include('layouts.manager.sidebar')

        <div class="kanan col-md-8 kios">
            <div class="custom-card p-5">
                <div class="d-flex justify-content-end">
                    <a class="cta-sm" href="{{ route('manager') }}">Back</a>
                </div>
                <!-- Identitas pemilik kios -->
                <div class="row">
                    <h5>Identitas Pemilik Kios</h5>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <p>NIK</p>
                                <p>Nama</p>
                                <p>Alamat</p>
                                <p>Jenis Kelamin</p>
                                <p>No WA</p>
                                <p>Email</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{$kios->seller->nik}}</p>
                                <p>{{$kios->seller->nama}}</p>
                                <p>{{$kios->seller->alamat}}</p>
                                <p>{{$kios->seller->jenis_kelamin == 1 ? 'Perempuan' : 'Laki-laki'}}</p>
                                <p>{{$kios->seller->no_wa}}</p>
                                <p>{{$kios->seller->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p>Scan KTP</p>
                        <img src="{{asset("storage/".$kios->seller->ktp_img)}}" class="img-fluid" alt="KTP" />
                    </div>
                </div>
                <!-- Akhir Identitas Pemilik kios -->

                <!-- Identitas Kios -->
                <div class="row">
                    <h5>Identitas Kios</h5>
                    <!-- nama dan nomor kios -->
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Nama Kios</p>
                                @if ($kios->no_kios)
                                <p>No Kios</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <p>{{ $kios->nama }}</p>
                                @if ($kios->no_kios)
                                <p>{{ $kios->no_kios }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- akhir nama dan nomor kios -->

                    <!-- daftar makanan -->
                    <div class="col-md-12">
                        <h6>Menu Makanan</h6>
                        <table class="table table-sm">
                            <tbody>
                                @forelse ($kios->menus as $menu)
                                @if ($menu->jenis_makanan == 1)
                                <tr>
                                    <td>{{ $menu->nama }}</td>
                                    <td>Rp {{ $menu->harga }}</td>
                                </tr>
                                @endif
                                @empty
                                <tr>
                                    <td>Belum ada menu</td>
                                    <td>Belum ada harga</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Akhir daftar makanan  -->

                    <!-- Daftar Minuman -->
                    <div class="col-md-12">
                        <h6>Menu Minuman</h6>
                        <table class="table table-sm">
                            <tbody>
                                @forelse ($kios->menus as $menu)
                                @if ($menu->jenis_makanan == 0)
                                <tr>
                                    <td>{{ $menu->nama }}</td>
                                    <td>Rp {{ $menu->harga }}</td>
                                </tr>
                                @endif
                                @empty
                                <tr>
                                    <td>Belum ada menu</td>
                                    <td>Belum ada harga</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Akhir daftar minuman -->

                    <!-- Keputusan & no kios -->
                    @if ($kios->agree == 1)
                    <div class="col-md-12">
                        <h5>Keputusan</h5>
                        <form action="{{ route('manager.kioses.verification', $kios->slug) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="agree" id="exampleRadios1" value="2"
                                    checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Setujui
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="agree" id="exampleRadios2" value="0">
                                <label class="form-check-label" for="exampleRadios2">
                                    Tolak
                                </label>
                            </div>
                            <!-- No kios -->
                            <div class="col-md-6">
                                @if(session()->has('no_kios'))
                                <div class="alert alert-danger mt-4">
                                    {{ session()->get('no_kios') }}
                                </div>
                                @endif
                                <label class="form-label">No Kios</label>
                                <input class="form-control" name='no_kios'>
                            </div>
                            <!-- Button submit -->
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn cta-sm">Submit</button>
                            </div>
                        </form>

                    </div>
                    @elseif ($kios->agree == 2)
                    <div class="alert alert-success mt-4">
                        Kios sudah diterima
                    </div>
                    <!-- Tombol delete -->
                    <div class="col-md-12 mt-2 mb-3">
                        <form method="" action="">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    <!-- Akhir tombol delete -->
                    @else
                    <div class="alert alert-danger mt-4">
                        Kios sudah ditolak
                    </div>
                    <!-- Tombol delete -->
                    <div class="col-md-12 mt-2 mb-3">
                        <form method="" action="">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    <!-- Akhir tombol delete -->
                    @endif
                    <!-- Akhir keputusan no kios dan submit -->
                </div>
                <!-- Akhir Identitas kios -->
            </div>
            <!-- Akhir custom card -->
        </div>
        <!-- Akhir bagian kanan -->
    </div>
</div>
<!-- Akhir konten -->

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