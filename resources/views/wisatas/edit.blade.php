{{-- Dibawah ini akan mengirimkan data title ke layouts/app --}}
@extends('layouts/app', ['title' => 'Update post'])



@section('content')
<div class="container">
    <div class="row">
        @if (session()->has('success'))
        {{ request()->session()->get('success') }}
        @endif
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update wisata: {{ $wisata->nama }}</div>

                <div class="card-body">
                    <form action="{{ route('wisatas.update', $wisata->slug) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- Agar form yang dibaca HTML 5 bisa support terhadapp method put atau patch --}}
                        @method('patch')
                        <div class="form-group">
                            <label for="nama">Nama Wisata</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ old('nama')??$wisata->nama }}">
                            @error('nama')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>

                            <textarea class="form-control" name="deskripsi" id="deskripsi"
                                rows="4">{{ old('deskripsi') ?? $wisata->deskripsi }}</textarea>
                            @error('deskripsi')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lokasi">lokasi Wisata</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control"
                                value="{{ old('lokasi')??$wisata->lokasi }}">
                            @error('lokasi')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gmap">gmap Wisata</label>
                            <input type="text" name="gmap" id="gmap" class="form-control"
                                value="{{ old('gmap')??$wisata->gmap }}">
                            @error('gmap')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        {{-- GAMBAR WISATA --}}
                        <label for="gambar">gambar Wisata</label>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <img src="{{ $wisata->takeImage() }}" width="40px">
                            </div>
                            <div class="col-md-6">
                                <input type="file" name="gambar" id="gambar" class="form-control"
                                    value="{{ old('gambar') ?? $wisata->gambar }}">
                            </div>
                            @error('gambar')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <label>tambah galeri</label>
                        <input type="file" name="galeri[]" id="galeri" class="form-control" multiple="true">
                        <div class="form-group row">
                            <div class="col-md-4">
                                @error('galeri')
                                <div class=" mt-2 text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Hapus galeri</div>
                <div class="card-body">
                    {{-- FORM GALERI UPDATE --}}
                    <input type="hidden" value="{{ $wisata->id }}" name="getWisataId">
                    <label>galeri gambar </label>
                    @forelse ( $galeriwisatas as $galeriwisata)
                    <div class="form-group">
                        <form method="POST" action="{{ route('galeriwisatas.delete', $galeriwisata->id) }}">
                            @csrf
                            @method('delete')
                            {{-- PASS DATA WISATA->SLUG --}}
                            <input type="hidden" value="{{ $wisata->slug }}" name="getWisataSlug">
                            <div class="col-md-4">
                                <img src="{{ asset('/storage/'.$galeriwisata->galeri) }}" width="40px">
                            </div>
                            <div class="col-md-4">
                                <button type="submit">Hapus</button>
                            </div>
                        </form>
                    </div>
                    @empty
                    <div class="alert alert-warning">Galeri Kosong.</div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>

@stop()
