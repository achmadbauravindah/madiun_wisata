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

    <h1>Lihat Lodger</h1>

    <div class="table-responsive py-4">
        <h3>Identitas Lodger</h3>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nama</label>
                <p class="form-control" readonly>{{$lodger->nama}}</p>
            </div>
            <div class="col-md-6    ">
                <label for="" class="form-label">Scan KTP</label>
                <p class="form-control"><img src="{{asset("storage/".$lodger->ktp_img)}}" alt="Scan KTP"
                        style="width: 20rem; height:auto;">
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">email</label>
            <p class="form-control" readonly>{{$lodger->email}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">nik</label>
            <p class="form-control" readonly>{{$lodger->nik}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">no_telp</label>
            <p class="form-control" readonly>{{$lodger->no_telp}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">no_wa</label>
            <p class="form-control" readonly>{{$lodger->no_wa}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">alamat</label>
            <p class="form-control" readonly>{{$lodger->alamat}}</p>
        </div>

        <div>
            <form action="{{ route('manage-lodger.delete', $lodger->id) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Delete Account</button>
            </form>
        </div>


    </div>

    <h1>Daftar penginapan</h1>
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
                @forelse($lodger->penginapans as $penginapan)
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
                <tr>
                    <td colspan="6">Tidak ada penginapan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
