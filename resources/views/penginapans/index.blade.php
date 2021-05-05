@extends('layouts/app')

@section('content')
<div class="container">
    @if (auth()->guard('lodger')->check())
    FOTO KTP
    <img class="card-img-top" src="{{  asset(auth()->guard('lodger')->user()->ktp_img) }}">
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Penginapan</div>

                <div class="card-body">
                    Selamat Datang Lodger, Silahkan Pilih
                    <br>
                    <a href="{{ route('showLodgerLoginForm') }}">Login Lodgers</a>
                    <br>
                    <a href="{{ route('showLodgerRegisterForm') }}">Sign Up Lodgers</a>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}

    {{-- <div class="container"> --}}
    @if (session()->has('success'))
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 bg-info">
                {{ request()->session()->get('success') }}
            </div>
        </div>
    </div>
    @endif
    <div class="d-flex justify-content-between">
        <div>
            @if (auth()->guard('admin')->check())
            <h1>All Penginapan, Halo admin {{ auth()->guard('admin')->user()->nama }}</h1>
            @elseif (auth()->guard('lodger')->check())
            <h1>All Penginapan, Halo lodger {{ auth()->guard('lodger')->user()->nama }}</h1>
            @else
            <h1>All Penginapan</h1>
            @endif
            <hr>
        </div>
        @if (auth()->guard('admin')->check() or auth()->guard('lodger')->check())
        <div>
            <a href="{{ route('penginapans.create') }}" class="btn btn-primary">Tambah Wisata</a>
        </div>
        @endif
    </div>

    <div class="row">
        @forelse ( $penginapans as $penginapan )
        <div class="col-md-4">
            <div class="card mb-4">
                {{-- Untuk menampilkan gambar, ini akan ditampilkan melalui folder storage --}}
                <img class="card-img-top" src="{{  asset($penginapan->takeImage()) }}">
                <div class="card-header">
                    {{ $penginapan->nama }}
                </div>
                <div class="card-body">
                    <div>
                        {{-- parameter limit(datanya, maks karakter, karakter yang akan diganti)  --}}
                        {{ Str::limit($penginapan->deskripsi,100,'...') }}
                    </div>
                    <a href="{{ route('penginapans.show', $penginapan->slug) }}">Read more</a>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    {{-- Published On {{ $post->created_at-> format("d M, Y")}} --}}
                    Published On {{ $penginapan->created_at->diffForHumans()}}
                    @if (auth()->guard('admin')->check() or auth()->guard('lodger')->check())
                    <a href="{{ route('penginapans.edit', $penginapan->slug) }}" class="btn btn-success btn-sm">Edit</a>
                    <form action="{{ route('penginapans.delete', $penginapan->slug) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>

        @empty
        <div class="alert alert-warning">There is No penginapans.</div>
        @endforelse

        {{-- @endforeach --}}

        {{-- Lanjutan pengecekan jika pake @if --}}
        {{-- @else
        < class="alert alert-info">There is No Posts.</>
        @endif --}}

    </div>
    {{-- PAGINATION --}}
    {{ $penginapans->links('pagination::bootstrap-4') }}
</div>

@stop()
