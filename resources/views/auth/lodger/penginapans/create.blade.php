@extends('layouts.lodger.app')

@section('title', 'Tambah Penginapan')

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
        @include('layouts.lodger.sidebar')

        <div class="kanan col-md-8">
            <div class="custom-card p-5">
                <a class="cta-sm mb-2" href="{{ route('lodger') }}">Back</a>

                <form class="form-crud row g-3" action="{{ route('penginapans.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Penginapan</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama')}}">
                        @error('nama')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control" value="{{ old('harga') }}">
                        @error('harga')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Lokasi" class="form-label">Lokasi Penginapan</label>
                        <input type="text" name="lokasi" id="Lokasi" class="form-control" value="{{ old('lokasi') }}">
                        @error('lokasi')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Maps" class="form-label">Link Maps</label>
                        <input type="text" name="gmap" id="Maps" class="form-control" value="{{ old('gmap') }}">
                        @error('gmap')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="spesifikasi" class="form-label">Spesifikasi</label>
                        <textarea name="spesifikasi" id="spesifikasi" cols="100%" rows="5"
                            class="form-control">{{ old('spesifikasi') }}</textarea>
                        @error('spesifikasi')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="formFile" class="form-label">Foto Depan</label>
                        <input class="form-control" type="file" id="formFile" name="imgdepan"
                            value="{{ old('imgdepan') }}" />
                        @error('imgdepan')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="formFile" class="form-label">Foto Kamar</label>
                        <input class="form-control" type="file" id="formFile" name="imgkamar"
                            value="{{ old('imgkamar') }}" />
                        @error('imgkamar')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="formFile" class="form-label">Foto Kamar Mandi</label>
                        <input class="form-control" type="file" id="formFile" name="imgwc" value="{{ old('imgwc') }}" />
                        @error('imgwc')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn cta-sm">Tambah</button>
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
