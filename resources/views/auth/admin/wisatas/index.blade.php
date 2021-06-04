@extends('layouts.admin.app')

@section('content')

<div class="container">

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

    <h1>Menu Wisata Admin</h1>

    <form action="{{ route('wisatas.create') }}" method="get">
        @csrf
        <button class="btn btn-primary">Tambah Wisata</button>
    </form>

    <div class="table-responsive py-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($wisatas as $wisata)
                <tr>
                    <th class="align-middle" scope="row">{{$loop->index + 1}}</th>
                    <td class="align-middle">{{ $wisata->nama }}</td>
                    <td class="align-middle">{{ $wisata->lokasi }}</td>
                    <td class="align-middle">
                        <a href="{{ route('wisatas.edit', $wisata->slug) }}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
                @empty
                Tidak ada data
                @endforelse
            </tbody>
        </table>
    </div>

</div>


@endsection
