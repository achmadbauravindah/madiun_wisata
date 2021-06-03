@extends('layouts.admin.app')

@section('title', 'Wisata')


@section('content')

<div class="container">

    <h1>Tambah Penginapan</h1>
    <div class="card mt-5">
        <div class="card-header">
            Create Pengianapans
        </div>

        <div class="card-body   ">

            <form action="{{ route('penginapans.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Isi dari semua form berada pada file form-control --}}
                <div class="form-group">
                    <label for="nama">Nama penginapan</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
                    @error('nama')
                    <div class="mt-2 text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lokasi">lokasi penginapan</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi') }}">
                    @error('lokasi')
                    <div class="mt-2 text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gmap">gmap penginapan (GMAPS)</label>
                    <input type="text" name="gmap" id="gmap" class="form-control" value="{{ old('gmap') }}">
                    @error('gmap')
                    <div class="mt-2 text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">harga</label>
                    <textarea class="form-control" name="harga" id="harga" rows="4">{{ old('harga') }}</textarea>
                    @error('harga')
                    <div class="mt-2 text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="spesifikasi">spesifikasi</label>

                    <textarea class="form-control" name="spesifikasi" id="spesifikasi"
                        rows="4">{{ old('spesifikasi') }}</textarea>
                    @error('spesifikasi')
                    <div class="mt-2 text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imgdepan">Tampak Depan penginapan</label>
                    <input type="file" name="imgdepan" id="imgdepan" class="form-control" value="{{ old('imgdepan') }}">
                    {{-- old('...') digunakan untuk mengambil value yang terkahir di masukan --}}
                    @error('imgdepan')
                    <div class="mt-2 text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imgkamar">Tampak Kamar penginapan</label>
                    <input type="file" name="imgkamar" id="imgkamar" class="form-control" value="{{ old('imgkamar') }}">
                    {{-- old('...') digunakan untuk mengambil value yang terkahir di masukan --}}
                    @error('imgkamar')
                    <div class="mt-2 text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imgwc">Tampak WC penginapan</label>
                    <input type="file" name="imgwc" id="imgwc" class="form-control" value="{{ old('imgwc') }}">
                    {{-- old('...') digunakan untuk mengambil value yang terkahir di masukan --}}
                    @error('imgwc')
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



@stop()
