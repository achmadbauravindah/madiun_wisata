@extends('layouts.seller.app')

@section('title', 'Atur Akun Seller')

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
                <form class="form-crud row g-3" action="{{ route('seller.update') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            value="{{ old('nama')??$seller->nama }}">
                        @error('nama')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control"
                            value="{{ old('nik')??$seller->nik }}" maxlength="16">
                        @error('nik')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="100%" rows="5"
                            class="form-control">{{ old('alamat')??$seller->alamat }}</textarea>
                        @error('alamat')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                            @if ($seller->jenis_kelamin == 1)
                            <option value="1">Perempuan</option>
                            <option value="0">Laki-Laki</option>
                            @else
                            <option value="0">Laki-Laki</option>
                            <option value="1">Perempuan</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="no_wa" class="form-label">No WA</label>
                        <input type="text" name="no_wa" id="no_wa" class="form-control"
                            value="{{ old('no_wa')??$seller->no_wa }}">
                        @error('no_wa')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control"
                            value="{{ old('email')??$seller->email }}">
                        @error('email')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="ktp_img" class="form-label">Scan KTP (jpg)</label>
                        <input class="form-control" type="file" id="ktp_img" name="ktp_img" />
                        <img class="mt-3 mb-5" src="{{ asset('/storage/'.$seller->ktp_img) }}" alt="penginapan" />
                        @error('ktp_img')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn cta-sm">Edit</button>
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
