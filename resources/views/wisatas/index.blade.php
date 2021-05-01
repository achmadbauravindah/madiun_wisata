@extends('layouts/app')

{{-- Ini terlalu ga rapi (harusnya navigasi ada di file app), ganti kalo nemu cara lain --}}
@section('navigation')
@if(request()->is('admin/*') and auth()->user())
@include('layouts.navigation_admin')
@elseif (!auth()->user())
@include('layouts.navigation')
@endif
@stop

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <div>
            @auth
            <h1>All Wisata, Halo admin {{ request()->user()->nama }}</h1>
            @else
            <h1>All Wisata</h1>
            @endauth
            <hr>
        </div>
        @auth
        <div>
            <a href="/admin/wisatas/create" class="btn btn-primary">Tambah Wisata</a>
        </div>
        @endauth
    </div>

    <div class="row">

        @forelse ( $wisatas as $wisata )
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    {{ $wisata->nama }}
                </div>
                <div class="card-body">
                    <div>
                        {{-- parameter limit(datanya, maks karakter, karakter yang akan diganti)  --}}
                        {{ Str::limit($wisata->deskripsi,100,'...') }}
                    </div>
                    <a href="/wisatas/{{ $wisata->slug }}">Read more</a>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    {{-- Published On {{ $post->created_at-> format("d M, Y")}} --}}
                    Published On {{ $wisata->created_at->diffForHumans()}}
                    @auth
                    <a href="/wisatas/{{ $wisata->slug }}/edit" class="btn btn-success btn-sm">Edit</a>
                    @endauth
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
