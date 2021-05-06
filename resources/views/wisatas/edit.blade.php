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
                <div class="card-header">Update post: {{ $wisata->nama }}</div>

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
                            <label for="gambar">gambar Wisata</label>
                            <input type="file" name="gambar" id="gambar" class="form-control"
                                value="{{ old('gambar')??$wisata->gambar }}">
                            @error('gambar')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <input type="hidden" value="{{ $wisata->id }}" name="getWisataId">
                        <label>galeri gambar </label>
                        {{-- @foreach ( as ) --}}

                        <div class="form-group row">
                            <div class="col-md-4">
                                <img src="fdgffgdf">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-warning"><label for="galeriKe">Ganti</label></button>
                                <input type="file" name="galeriKe" id="galeriKe" class="form-control" multiple="true"
                                    style="display:none">
                            </div>
                            <div class="col-md-4">
                                {{-- <form action="" method="post">
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form> --}}
                            </div>
                        </div>
                        {{-- @endforeach --}}

                        <input type="file" name="galeri[]" id="galeri" class="form-control" multiple="true">
                        <div class="form-group row">
                            <div class="col-md-4">
                                {{-- <button class="btn btn-success"><label for="galeri">Tambah Galeri</label></button> --}}
                                @error('galeri')
                                <div class=" mt-2 text-danger">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                    </form>
                </div>


            </div>
        </div>

    </div>
</div>



@stop()
