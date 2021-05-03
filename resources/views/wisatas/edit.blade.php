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

                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>


            </div>
        </div>

    </div>
</div>



@stop()