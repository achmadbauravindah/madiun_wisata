@extends('layouts/app')

@section('content')
<div class="container">
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
            <h1>All Wisata, Halo admin {{ auth()->guard('admin')->user()->nama }}</h1>
            @else
            <h1>All Wisata</h1>
            @endif
            <hr>
        </div>
        @if (auth()->guard('admin')->check())
        <div>
            <a href="{{ route('wisatas.create') }}" class="btn btn-primary">Tambah Wisata</a>
        </div>
        @endif
    </div>

    <div class="row">
        @forelse ( $wisatas as $wisata )
        <div class="col-md-4">
            <div class="card mb-4">
                {{-- Untuk menampilkan gambar, ini akan ditampilkan melalui folder storage --}}
                <img class="card-img-top" src="{{  asset($wisata->takeImage()) }}">
                <div class="card-header">
                    {{ $wisata->nama }}
                </div>
                <div class="card-body">
                    <div>
                        {{-- parameter limit(datanya, maks karakter, karakter yang akan diganti)  --}}
                        {{ Str::limit($wisata->deskripsi,100,'...') }}
                    </div>
                    <a href="{{ route('wisatas.show',$wisata->slug) }}">Details</a>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    {{-- Published On {{ $post->created_at-> format("d M, Y")}} --}}
                    Published On {{ $wisata->created_at->diffForHumans()}}
                    @if (auth()->guard('admin')->check())
                    <a href="{{ route('wisatas.edit', $wisata->slug) }}" class="btn btn-success btn-sm">Edit</a>
                    <form action="{{ route('wisatas.delete', $wisata->slug) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>

        @empty
        <div class="alert alert-warning">There is No Wisatas.</div>
        @endforelse

        {{-- @endforeach --}}

        {{-- Lanjutan pengecekan jika pake @if --}}
        {{-- @else
        < class="alert alert-info">There is No Posts.</>
        @endif --}}

    </div>
    {{-- PAGINATION --}}
    {{ $wisatas->links('pagination::bootstrap-4') }}
</div>

@stop()
