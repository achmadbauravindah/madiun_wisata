@extends('layouts.lodger.app')

@section('title', 'Login Lodger')

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
    <div class="container d-flex justify-content-center">
        <div class="custom-card p-3 col-md-4">
            <h3 class="judul text-center">LOGIN</h3>
            <form class="row g-3" method="POST" action="{{ route('lodger.login') }}">
                @csrf
                @method('post')
                <div class="col-md-12">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                        value="{{ old('nik') }}" maxlength="16" />
                    @error('nik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid
                        @enderror" id="inputPassword4" name="password" autocomplete="current-password" />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="d-flex justify-content-center mt-5 mb-5">
                    <button type="submit" class="btn cta">Sign in</button>
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
