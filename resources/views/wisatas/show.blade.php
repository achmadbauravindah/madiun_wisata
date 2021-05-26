@extends('layouts.app')
@section('title' , $wisata->nama)


@section('content')
<div class="container">
    <h1>Nama Wisata : </h1>
    <p>{{ $wisata->nama }}</p>
    <h1>Deskripsi : </h1>
    <p>{{ $wisata->deskripsi }}</p>
    <h1>Gambar Branding :</h1>
    <img src="{{ $wisata->takeImage() }}" width="150">
    <h1>Lokasi : </h1>
    <p>{{ $wisata->lokasi }}</p>
    <h1>Gambar Galeri :</h1>
    @foreach ($galeriwisatas as $galeriwisata)
    {{-- {{ dd(asset('/storage/' . $galeriwisata->galeri)) }} --}}
    <img src="{{ asset('/storage/' . $galeriwisata->galeri) }}" width="70">
    @endforeach
</div>
@endsection
