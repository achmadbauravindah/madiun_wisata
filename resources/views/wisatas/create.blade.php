{{-- Dibawah ini akan mengirimkan data title ke layouts/app --}}
@extends('layouts/app', ['title' => 'Tambah Wisata'])


{{-- @section('title', 'Create Post') --}}

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
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
                            @error('nama')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>

                            <textarea class="form-control" name="deskripsi" id="deskripsi"
                                rows="4">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lokasi">lokasi Wisata</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control"
                                value="{{ old('lokasi') }}">
                            @error('lokasi')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">gambar Wisata</label>
                            <input type="file" name="gambar" id="gambar" class="form-control"
                                value="{{ old('gambar') }}">
                            {{-- old('...') digunakan untuk mengambil value yang terkahir di masukan --}}
                            @error('gambar')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="galeri">galeri Wisata</label>
                            <input type="file" name="galeri[]" id="galeri" class="form-control"
                                value="{{ old('galeri') }}" multiple="true">
                            {{-- old('...') digunakan untuk mengambil value yang terkahir di masukan --}}
                            @error('galeri')
                            <div class="mt-2 text-danger">
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
