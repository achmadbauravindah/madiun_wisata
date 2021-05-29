{{-- Dibawah ini akan mengirimkan data title ke layouts/app --}}
@extends('layouts/app', ['title' => 'Update post'])



@section('content')
<div class="container">
    <div class="row mt-5">
        @if (session()->has('success'))
        {{ request()->session()->get('  success') }}
        @endif
        <div class="col-md-6 mt-5">
            <div class="card">
                <div class="card-header">Update post: {{ $penginapan->nama }}</div>

                <div class="card-body">
                    <form action="{{ route('penginapans.update', $penginapan->slug) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- Agar form yang dibaca HTML 5 bisa support terhadapp method put atau patch --}}
                        @method('patch')
                        <div class="form-group">
                            <label for="nama">Nama penginapan</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ old('nama')??$penginapan->nama }}">
                            @error('nama')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="lokasi">lokasi penginapan</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control"
                                value="{{ old('lokasi')??$penginapan->lokasi }}">
                            @error('lokasi')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gmap">Lokasi gmap penginapan</label>
                            <input type="text" name="gmap" id="gmap" class="form-control"
                                value="{{ old('gmap')??$penginapan->gmap }}">
                            @error('gmap')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga">harga penginapan</label>
                            <input type="text" name="harga" id="harga" class="form-control"
                                value="{{ old('harga')??$penginapan->harga }}">
                            @error('harga')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="spesifikasi">spesifikasi penginapan</label>
                            <input type="text" name="spesifikasi" id="spesifikasi" class="form-control"
                                value="{{ old('spesifikasi')??$penginapan->spesifikasi }}">
                            @error('spesifikasi')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="imgdepan">Tampak Depan penginapan</label>
                            <input type="file" name="imgdepan" id="imgdepan" class="form-control"
                                value="{{ old('imgdepan') }}">
                            {{-- old('...') digunakan untuk mengambil value yang terkahir di masukan --}}
                            @error('imgdepan')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="imgkamar">Tampak Kamar penginapan</label>
                            <input type="file" name="imgkamar" id="imgkamar" class="form-control"
                                value="{{ old('imgkamar') }}">
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

                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>


            </div>
        </div>

    </div>
</div>



@stop()
