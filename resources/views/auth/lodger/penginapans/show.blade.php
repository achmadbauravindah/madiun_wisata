@extends('layouts.app')

@section('title',$penginapan->nama)

@section('content')
<div class="container">
    {{-- Mengambil data slug  --}}
    <h1 class="mt-5">{{ $penginapan->nama }}</h1>
    <p>{{ $penginapan->deskripsi }}</p>
    Gambar {{ $penginapan->gambar }}
    {{-- MODAL --}}

    <form action="{{ route('penginapans.delete',$penginapan->slug) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="mt-5">Delete</button>
    </form>



</div>
@endsection
