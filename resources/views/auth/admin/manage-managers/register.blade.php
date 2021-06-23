@extends('layouts.admin.app')


@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            Register Manager
        </div>
        <div class="card-body">
            <form method="POST" action='{{ route('manager.register') }}' aria-label="{{ __('Register') }}"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="lapakumkm_id"
                        class="col-md-4 col-form-label text-md-right">{{ __('Lapak UMKM') }}</label>

                    <div class="col-md-6">
                        <select name="lapakumkm_id" id="lapakumkm_id">
                            @forelse ($lapakumkms as $lapakumkm)
                            <option value="{{ $lapakumkm->id }}">
                                {{ $lapakumkm->nama.'('.$lapakumkm->kelurahan.')' }}
                            </option>
                            @empty
                            <option value="0">
                                Kosong
                            </option>
                            @endforelse
                        </select>
                        @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                    <div class="col-md-6">
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                            name="nama" value="{{ old('nama') }}" autocomplete="nama" autofocus>

                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('No. KTP') }}</label>

                    <div class="col-md-6">
                        <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                            value="{{ old('nik') }}" autocomplete="nik" maxlength="16">

                        @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ktp_img"
                        class="col-md-4 col-form-label text-md-right">{{ __('Bukti Foto KTP') }}</label>
                    <div class="col-md-6">
                        <input id="ktp_img" type="file" class="form-control @error('nik') is-invalid @enderror"
                            name="ktp_img" value="{{ old('ktp_img') }}" autocomplete="ktp_img">
                        @error('ktp_img')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="no_wa" class="col-md-4 col-form-label text-md-right">{{ __('No. WA') }}</label>

                    <div class="col-md-6">
                        <input id="no_wa" type="text" class="form-control @error('no_wa') is-invalid @enderror"
                            name="no_wa" value="{{ old('no_wa') }}" autocomplete="no_wa">

                        @error('no_wa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                    <div class="col-md-6">
                        <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                            name="alamat" value="{{ old('alamat') }}" autocomplete="alamat">
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
