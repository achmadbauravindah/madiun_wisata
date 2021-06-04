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

    <h1>Menu Manage Lodger</h1>

    <div class="table-responsive py-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No KTP</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($lodgers as $lodger)
                <tr>
                    <th class="align-middle" scope="row">{{$loop->index + 1}}</th>
                    <td class="align-middle">{{ $lodger->nama }}</td>
                    <td class="align-middle">{{ $lodger->email }}</td>
                    <td class="align-middle">{{ $lodger->nik }}</td>


                    @if (($lodger->penginapans)->isEmpty())
                    <td class="align-middle">
                        <a href="{{ route('manage-lodger.show', $lodger->id) }}" class="btn btn-warning">Lihat</a>
                    </td>
                    @else
                    <td class="align-middle">
                        <a href="{{ route('manage-lodger.show', $lodger->id) }}" class="btn btn-success">Lihat</a>
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
