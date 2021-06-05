@extends('layouts.admin.app')

@section('content')

<div class="container">
    <h1>Edit lapakumkm</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update lapak: {{ $lapakumkm->nama }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.lapakumkms.update', $lapakumkm->slug) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="nama">Nama lapakumkm</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ old('nama')??$lapakumkm->nama }}">
                            @error('nama')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kelurahan">kelurahan lapakumkm</label>
                            <input type="text" name="kelurahan" id="kelurahan" class="form-control"
                                value="{{ old('kelurahan')??$lapakumkm->kelurahan }}">
                            @error('kelurahan')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="lokasi">lokasi lapakumkm</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control"
                                value="{{ old('lokasi')??$lapakumkm->lokasi }}">
                            @error('lokasi')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gmap">Lokasi gmap lapakumkm</label>
                            <input type="text" name="gmap" id="gmap" class="form-control"
                                value="{{ old('gmap')??$lapakumkm->gmap }}">
                            @error('gmap')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto lapakumkm</label>
                            <input type="file" name="foto" id="foto" class="form-control" value="{{ old('foto') }}">
                            {{-- old('...') digunakan untuk mengambil value yang terkahir di masukan --}}
                            @error('foto')
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
    <form action="{{ route('admin.lapakumkms.delete', $lapakumkm->slug) }}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger">Hapus lapakumkm</button>
    </form>
</div>



@endsection()
