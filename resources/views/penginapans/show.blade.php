@extends('layouts.app')

@section('title',$penginapan->nama)

@section('content')
<div class="container">
    {{-- Mengambil data slug  --}}
    <h1>{{ $penginapan->nama }}</h1>
    <p>{{ $penginapan->deskripsi }}</p>
    Gambar {{ $penginapan->gambar }}
    {{-- MODAL --}}



</div>
@endsection
