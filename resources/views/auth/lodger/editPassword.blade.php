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
            <div class="custom-card p-5">
                <form class="row g-3" method="post" action="{{ route('lodger.updatePassword') }}">
                    @csrf
                    @method('patch')
                    <div class="col-md-12">
                        <label for="oldPassword" class="form-label @error('password') is-invalid @enderror">Password
                            Lama</label>
                        <input type="oldPassword" class="form-control" id="oldPassword" name="oldPassword" />
                        @error('oldPassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" autocomplete="new-password" id="password" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" autocomplete="new-password" />
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn cta-sm">Submit</button>
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
