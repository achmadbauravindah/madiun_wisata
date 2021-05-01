{{-- Dibawah ini akan mengirimkan data title ke layouts/app --}}
@extends('layouts/app', ['title' => 'Create Post'])


@section('title', 'Create Post')

@section('content')
@if (session()->has('success'))
{{ request()->session()->get('success') }}
@endif
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Tambah Wisata</div>

                <div class="card-body   ">

                    <form action="{{ route('wisatas.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- Isi dari semua form berada pada file form-control --}}
                        <div class="form-group">
                            <label for="nama">Nama Wisata</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ old('nama')??$wisata->nama }}">
                            {{-- old('...') digunakan untuk mengambil value yang terkahir di masukan --}}
                            @error('nama')
                            <div class="mt-2 text-danger">
                                {{-- nama harus diisi --}}
                                {{-- Dibawah ini jika menggunakan pesan default dari laravel --}}
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>

                            <textarea class="form-control" name="deskripsi" id="deskripsi"
                                rows="4">{{ old('deskripsi') ?? $wisata->deskripsi }}</textarea>
                            {{-- <input type=" text" name="deskripsi" id="deskripsi" class="form-control" rows="5"
                                value="{{ old('deskripsi')??$wisata->deskripsi }}"> --}}
                            {{-- old('...') digunakan untuk mengambil value yang terkahir di masukan --}}
                            @error('deskripsi')
                            <div class="mt-2 text-danger">
                                {{-- deskripsi harus diisi --}}
                                {{-- Dibawah ini jika menggunakan pesan default dari laravel --}}
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lokasi">lokasi Wisata</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control"
                                value="{{ old('lokasi')??$wisata->lokasi }}">
                            {{-- old('...') digunakan untuk mengambil value yang terkahir di masukan --}}
                            @error('lokasi')
                            <div class="mt-2 text-danger">
                                {{-- lokasi harus diisi --}}
                                {{-- Dibawah ini jika menggunakan pesan default dari laravel --}}
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">gambar Wisata</label>
                            <input type="file" name="gambar" id="gambar" class="form-control"
                                value="{{ old('gambar')??$wisata->gambar }}">
                            {{-- old('...') digunakan untuk mengambil value yang terkahir di masukan --}}
                            @error('gambar')
                            <div class="mt-2 text-danger">
                                {{-- gambar harus diisi --}}
                                {{-- Dibawah ini jika menggunakan pesan default dari laravel --}}
                                {{ $message }}
                            </div>
                            @enderror
                        </div>



                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>

                </div>


            </div>
        </div>

    </div>
</div>



@stop()
