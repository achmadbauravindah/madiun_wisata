@extends('layouts.admin.app')

@section('title', 'Wisata')


@section('content')

<div class="container">

    <h1>Tambah Lapak UMKM</h1>
    <div class="card mt-5">
        <div class="card-header">
            Create Lapak UMKM
        </div>

        <div class="card-body   ">

            <form action="{{ route('admin.lapakumkms.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nama">Nama lapak UMKM</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
                    @error('nama')
                    <div class="mt-2 text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kelurahan">kelurahan Lapak</label>
                    <input type="text" name="kelurahan" id="kelurahan" class="form-control"
                        value="{{ old('kelurahan') }}">
                    @error('kelurahan')
                    <div class="mt-2 text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lokasi">lokasi Lapak</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi') }}">
                    @error('lokasi')
                    <div class="mt-2 text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gmap">gmap lapak</label>
                    <input type="text" name="gmap" id="gmap" class="form-control" value="{{ old('gmap') }}">
                    @error('gmap')
                    <div class="mt-2 text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="foto">Foto lapak</label>
                    <input type="file" name="foto" id="foto" class="form-control" value="{{ old('foto') }}">
                    {{-- old('...') digunakan untuk mengambil value yang terkahir di masukan --}}
                    @error('foto')
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
