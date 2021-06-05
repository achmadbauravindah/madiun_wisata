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

    <h1>Menu Manage Manager</h1>

    <form action="{{ route('showManagerRegisterForm') }}" method="get">
        @csrf
        <button class="btn btn-primary">Daftarkan Manager</button>
    </form>

    <div class="table-responsive py-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No KTP</th>
                    <th scope="col">Lapak</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($managers as $manager)
                <tr>
                    <th class="align-middle" scope="row">{{$loop->index + 1}}</th>
                    <td class="align-middle">{{ $manager->nama }}</td>
                    <td class="align-middle">{{ $manager->nik }}</td>
                    @if ($manager->lapakumkm)
                    <td class="align-middle">{{ $manager->lapakumkm->nama}}</td>
                    <td class="align-middle">
                        <a href="{{ route('manage-manager.show', $manager->id) }}" class="btn btn-success">Lihat</a>
                    </td>
                    @else
                    <td class="align-middle">-</td>
                    <td class="align-middle">
                        <a href="{{ route('manage-manager.show', $manager->id) }}" class="btn btn-warning">Lihat</a>
                    </td>
                    @endif
                </tr>
                @empty
                Tidak ada data
                @endforelse
            </tbody>
        </table>
    </div>

</div>


@endsection
