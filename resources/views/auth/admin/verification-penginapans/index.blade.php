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

    <h1>Menu Verifikasi Penginapan</h1>


    <div class="table-responsive py-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Agree</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penginapans as $penginapan)
                <tr>
                    <th class="align-middle" scope="row">{{$loop->index + 1}}</th>
                    <td class="align-middle">{{ $penginapan->nama }}</td>
                    <td class="align-middle">{{ $penginapan->lokasi }}</td>
                    <td class="align-middle">{{ $penginapan->harga }}</td>
                    <td class="align-middle">{{ $penginapan->agree }}</td>
                    <td class="align-middle">
                        <a href="{{ route('admin.penginapans.show', $penginapan->slug) }}"
                            class="btn btn-success">Lihat</a>
                    </td>
                </tr>
                @empty
                Anda tidak mempunyai penginapan
                @endforelse
            </tbody>
        </table>
    </div>

</div>


@endsection
