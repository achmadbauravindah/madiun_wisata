@extends('layouts.admin.app')

@section('title', 'Verifikasi Penginapan')

@section('header')
<!-- Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome.min.css" />
<!-- AOS Animasi -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- font awesome icon -->
<script src="https://kit.fontawesome.com/f8dd01d0f4.js" crossorigin="anonymous"></script>
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
        @include('layouts.admin.sidebar')

        <div class="kanan col-md-8 kios">
            <div class="custom-card p-5">
                <div class="d-flex justify-content-end">
                    <a class="cta-sm" href="{{ route('admin') }}">Back</a>
                </div>
                <!-- Identitas pemilik penginapan -->
                <div class="row">
                    <h5>Identitas Lodger</h5>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="fw-bold">NIK</p>
                                <p>{{$penginapan->lodger->nik}}</p>
                                <p class="fw-bold">Nama</p>
                                <p>{{$penginapan->lodger->nama}}</p>
                                <p class="fw-bold">Jenis Kelamin</p>
                                <p>{{$penginapan->lodger->jenis_kelamin == 1 ? 'Perempuan' : 'Laki-laki'}}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="fw-bold">Alamat</p>
                                <p>{{$penginapan->lodger->alamat}}</p>
                                <p class="fw-bold">No WA</p>
                                <p>{{$penginapan->lodger->no_wa}}</p>
                                <p class="fw-bold">Email</p>
                                <p> {{$penginapan->lodger->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="fw-bold">Scan KTP</p>
                        <img src="{{asset("storage/".$penginapan->lodger->ktp_img)}}" class="img-fluid" alt="KTP" />
                    </div>
                </div>
                <!-- Akhir Identitas pemilik penginapan -->

                <!-- Identitas Penginapan -->
                <div class="row">
                    <h5>Penginapan</h5>
                    <!-- nama dan nomor kios -->
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="fw-bold">Nama Penginapan</p>
                                <p>{{ $penginapan->nama }}</p>
                                <p class="fw-bold">Harga</p>
                                <p>{{ $penginapan->harga }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="fw-bold">Alamat</p>
                                <p>{{ $penginapan->lokasi }}</p>
                                <p class="fw-bold">Maps</p>
                                <p><a href="{{ $penginapan->gmap }}">Lihat maps</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- akhir nama dan nomor kios -->

                    <!-- Gambar-->
                    <div class="col-md-12">
                        <h5>Gambar Penginapan</h5>
                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <p class="fw-bold">Tampak Depan</p>
                                <img src="{{ asset('/storage/'.$penginapan->imgdepan) }}" class="img-fluid"
                                    alt="depan" />
                            </div>
                            <div class="col-md-12 mt-4">
                                <p class="fw-bold">Kamar Tidur</p>
                                <img src="{{ asset('/storage/'.$penginapan->imgkamar) }}" class="img-fluid"
                                    alt="kamar" />
                            </div>
                            <div class="col-md-12 mt-4">
                                <p class="fw-bold">Kamar Mandi</p>
                                <img src="{{ asset('/storage/'.$penginapan->imgwc) }}" class="img-fluid"
                                    alt="kamar-mandi" />
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Gambar -->


                    <!-- Keputusan & no kios -->
                    @if ($penginapan->agree == 1)
                    <div class="col-md-12">
                        <h5>Keputusan</h5>
                        <form action="{{ route('admin.penginapans.verification', $penginapan->slug) }}" method="post">
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
                            <!-- Button submit -->
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn cta-sm">Submit</button>
                            </div>
                        </form>

                    </div>
                    @elseif ($penginapan->agree == 2)
                    <div class="alert alert-success mt-4">
                        Penginapan sudah diterima
                    </div>
                    <!-- Tombol delete -->
                    <div class="col-md-12 mt-2 mb-3">
                        <form method="post" action="{{ route('admin.penginapans.delete', $penginapan->slug) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    <!-- Akhir tombol delete -->
                    @else
                    <div class="alert alert-danger mt-4">
                        Penginapan sudah ditolak
                    </div>
                    <!-- Tombol delete -->
                    <div class="col-md-12 mt-2 mb-3">
                        <form method="post" action="{{ route('admin.penginapans.delete', $penginapan->slug) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    <!-- Akhir tombol delete -->
                    @endif
                    <!-- Akhir keputusan no kios dan submit -->
                </div>
                <!-- Akhir Identitas Penginapan -->
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
