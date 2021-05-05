{{-- Dibawah ini akan mengirimkan data title ke layouts/app --}}
@extends('layouts/app', ['title' => 'Tambah penginapan'])


{{-- @section('title', 'Create Post') --}}

@section('content')
@if (session()->has('success'))
{{ request()->session()->get('success') }}
@endif
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Tambah penginapan</div>

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
                            <input type="text" name="lokasi" id="lokasi" class="form-control"
                                value="{{ old('lokasi') }}">
                            @error('lokasi')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga">harga</label>

                            <textarea class="form-control" name="harga" id="harga"
                                rows="4">{{ old('harga') }}</textarea>
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
                            <label for="gambar">gambar penginapan</label>
                            <input type="file" name="gambar" id="gambar" class="form-control"
                                value="{{ old('gambar') }}">
                            {{-- old('...') digunakan untuk mengambil value yang terkahir di masukan --}}
                            @error('gambar')
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
