@extends('layouts.admin.app')

@section('title', 'Tambah Lapak')

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
                <a class="cta-sm mb-2" href="{{ route('admin') }}">Back</a>

                <form class="form-crud row g-3" action="{{ route('admin.lapakumkms.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="col-md-12">
                        <label for="nama" class="form-label">Nama Lapak</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama')}}">
                        @error('nama')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="kelurahan" class="form-label">Nama Kelurahan</label>
                        <input type="text" name="kelurahan" id="kelurahan" class="form-control"
                            value="{{ old('kelurahan')}}">
                        @error('kelurahan')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="lokasi" class="form-label">Lokasi Lapak</label>
                        <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi') }}">
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
                        <label for="foto" class="form-label">Foto Lapak</label>
                        <input class="form-control" type="file" id="foto" name="foto" value="{{ old('foto') }}" />
                        @error('foto')
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
