@extends('layouts.admin.app')

@section('content')

<div class="container">
    <h1>Atur Akun Seller</h1>

    @if(session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger mt-4">
        {{ session()->get('error') }}
    </div>
    @endif

    <div class="row">
        <div class="card">
            <div class="card-header">Update Akun: {{ $seller->nama }}</div>

            <div class="card-body">
                <form action="{{ route('seller.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="nama">Nama seller</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            value="{{ old('nama')??$seller->nama }}">
                        @error('nama')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email seller</label>
                        <input type="text" name="email" id="email" class="form-control"
                            value="{{ old('email')??$seller->email }}">
                        @error('email')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="nik">nik seller</label>
                        <input type="text" name="nik" id="nik" class="form-control"
                            value="{{ old('nik')??$seller->nik }}" maxlength="16">
                        @error('nik')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="ktp_img">Foto KTP</label>
                        <div class="col-md-6">
                            <img src="{{ asset('/storage/'.$seller->ktp_img) }}" width="100px">
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="ktp_img" id="ktp_img" class="form-control"
                                value="{{ old('ktp_img') ?? $seller->ktp_img }}">
                        </div>
                        @error('ktp_img')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="no_wa">no_wa seller</label>
                        <input type="text" name="no_wa" id="no_wa" class="form-control"
                            value="{{ old('no_wa')??$seller->no_wa }}">
                        @error('no_wa')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin"
                            class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                        <select name="jenis_kelamin" id="jenis_kelamin">
                            <option value="0">Laki-laki</option>
                            <option value="1">Perempuan</option>
                        </select>

                        @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat"
                            rows="4">{{ old('alamat') ?? $seller->alamat }}</textarea>
                        @error('alamat')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">ganti password seller (opsional)</label>
                        <input type="text" name="password" id="password" class="form-control">
                        @error('password')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">password_confirmation seller</label>
                        <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
                        @error('password_confirmation')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit">Simpan</button>
                </form>
            </div>

        </div>

    </div>
</div>
@endsection
