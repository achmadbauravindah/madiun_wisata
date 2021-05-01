@extends('layouts.app')

@section('title',$wisata->nama)

@section('content')
<div class="container">
    {{-- Mengambil data slug  --}}
    <h1>{{ $wisata->nama }}</h1>
    <p>{{ $wisata->deskripsi }}</p>
    {{-- MODAL --}}



</div>
@endsection
