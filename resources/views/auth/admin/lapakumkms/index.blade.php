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

    <h1>Menu lapakumkm Admin</h1>

    <form action="{{ route('admin.lapakumkms.create') }}" method="get">
        @csrf
        <button class="btn btn-primary">Tambah lapakumkm</button>
    </form>

    <div class="table-responsive py-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($lapakumkms as $lapakumkm)
                <tr>
                    <th class="align-middle" scope="row">{{$loop->index + 1}}</th>
                    <td class="align-middle">{{ $lapakumkm->nama }}</td>
                    <td class="align-middle">
                        <a href="{{ route('admin.lapakumkms.edit', $lapakumkm->slug) }}"
                            class="btn btn-success">Edit</a>
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
