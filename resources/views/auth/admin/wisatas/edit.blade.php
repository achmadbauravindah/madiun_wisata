@extends('layouts.admin.app')

@section('title', 'Admin')

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

    <div class="row justify-content-between">

        {{-- SIDEBAR --}}
        @include('layouts.admin.sidebar')

        <div class="kanan col-md-8">
            <div class="custom-card p-5">
                <div class="d-flex justify-content-end">
                    <a class="cta-sm mb-4" href="{{ route('admin') }}">Back</a>
                </div>

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

                <h2>Wisata</h2>
                <form class="form-crud row g-3" action="{{ route('wisatas.update', $wisata->slug) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="col-md-12">
                        <label for="nama" class="form-label">Nama Tempat Wisata</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            value="{{ old('nama')??$wisata->nama}}">
                        @error('nama')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="lokasi" class="form-label">Lokasi Wisata</label>
                        <input type="text" name="lokasi" id="lokasi" class="form-control"
                            value="{{ old('lokasi') ?? $wisata->lokasi }}">
                        @error('lokasi')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Maps" class="form-label">Link Maps</label>
                        <input type="text" name="gmap" id="Maps" class="form-control"
                            value="{{ old('gmap') ??$wisata->gmap }}">
                        @error('gmap')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="100%" rows="5"
                            class="form-control">{{ old('deskripsi') ?? $wisata->deskripsi }}</textarea>
                        @error('deskripsi')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="gambar" class="form-label">Gambar Wisata</label>
                        <input class="form-control" type="file" id="gambar" name="gambar"
                            value="{{ old('gambar') ?? $wisata->gambar }}" />
                        <img class="mt-3 mb-5" src="{{ asset('/storage/' . $wisata->gambar) }}" alt="penginapan" />
                        @error('gambar')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="galeriwisatas" class="form-label">Galeri Wisata</label>
                        <input class="form-control" type="file" id="galeriwisatas" name="galeri[]"
                            value="{{ old('galeri') }}" multiple="true" />
                        @error('galeri')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn cta-sm btn-success">Edit</button>
                    </div>
                </form>

                <h2 class="mt-5">Galeri Wisata</h2>
                @forelse ($galeriwisatas as $galeriwisata)
                <form method="POST" action="{{ route('galeriwisatas.delete', $galeriwisata->id) }}">
                    @csrf
                    @method('delete')
                    <div class="col-12 mt-3">
                        <label for="galeri" class="form-label">Galeri {{ $loop->index+1 }}</label>
                        <input type="hidden" value="{{ $wisata->slug }}" name="getWisataSlug">
                        <input class="form-control" type="file" id="galeri" />
                        <img class="mt-3 mb-5" style="width: 80%" src="{{ asset('/storage/'.$galeriwisata->galeri) }}"
                            alt="galeri" />
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </form>
                @empty
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
                @endforelse
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
