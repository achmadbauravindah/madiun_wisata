@extends('layouts.admin.app')

@section('title', 'Daftarkan Manager')

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
                    <a class="cta-sm mb-2" href="{{ route('admin') }}">Back</a>
                </div>

                <form class="form-crud row g-3" action="{{ route('manager.register') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="name"
                            name="nama" value="{{ old('nama') }}" />
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="nik" class="form-label">nik</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            maxlength="16" name="nik" value="{{ old('nik') }}" />
                        @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12  ">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="address" cols="100%" rows="5"
                            class="form-control @error('alamat') is-invalid @enderror"
                            name="alamat">{{ old('alamat') }}</textarea>
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="no_wa" class="form-label">No WA</label>
                        <input type="text" class="form-control @error('no_wa') is-invalid @enderror" name="no_wa"
                            value="{{ old('no_wa') }}" id="no_wa" />
                        @error('no_wa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" id="email" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="ktp_img" class="form-label">Scan KTP (jpg)</label>
                        <input class="form-control @error('ktp_img') is-invalid @enderror" name="ktp_img"
                            value="{{ old('ktp_img') }}" type="file" id="ktp_img" />
                        @error('ktp_img')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" autocomplete="new-password" id="password" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" autocomplete="new-password" />
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
