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

    <h1>Verifikasi Penginapan</h1>

    <div class="table-responsive py-4">
        <h3>Identitas Lodger</h3>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nama</label>
                <p class="form-control" readonly>{{$penginapan->lodger->nama}}</p>
            </div>
            <div class="col-md-6    ">
                <label for="" class="form-label">Scan KTP</label>
                <p class="form-control"><img src="{{asset("/storage/".$penginapan->lodger->ktp_img)}}" alt="Scan KTP"
                        style="width: 20rem; height:auto;">
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">email</label>
            <p class="form-control" readonly>{{$penginapan->lodger->email}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">nik</label>
            <p class="form-control" readonly>{{$penginapan->lodger->nik}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">no_telp</label>
            <p class="form-control" readonly>{{$penginapan->lodger->no_telp}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">no_wa</label>
            <p class="form-control" readonly>{{$penginapan->lodger->no_wa}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">alamat</label>
            <p class="form-control" readonly>{{$penginapan->lodger->alamat}}</p>
        </div>

        <h3>Identitas Penginapan</h3>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nama</label>
                <p class="form-control" readonly>{{$penginapan->nama}}</p>
            </div>
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">Foto Depan</label>
            <p class="form-control"><img src="{{asset("/storage/".$penginapan->imgdepan)}}" alt="Gambar Penginapan"
                    style="width: 20rem; height:auto;">
            </p>
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">Foto Kamar</label>
            <p class="form-control"><img src="{{asset("/storage/".$penginapan->imgkamar)}}" alt="Gambar Penginapan"
                    style="width: 20rem; height:auto;">
            </p>
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">Foto WC</label>
            <p class="form-control"><img src="{{asset("/storage/".$penginapan->imgwc)}}" alt="Gambar Penginapan"
                    style="width: 20rem; height:auto;">
            </p>
        </div>
        <div class="col-md-6">
            <label class="form-label">lokasi</label>
            <p class="form-control" readonly>{{$penginapan->lokasi}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">gmap</label>
            <p class="form-control" readonly>{{$penginapan->gmap}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">harga</label>
            <p class="form-control" readonly>{{$penginapan->harga}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">spesifikasi</label>
            <p class="form-control" readonly>{{$penginapan->spesifikasi}}</p>
        </div>

        @if ($penginapan->agree == 1)
        <h2>Keputusan</h2>
        <form action="{{ route('admin.penginapans.verification', $penginapan->slug) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-check">
                <input class="form-check-input" type="radio" name="agree" id="exampleRadios1" value="2" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Setujui
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="agree" id="exampleRadios2" value="0">
                <label class="form-check-label" for="exampleRadios2">
                    Tolak
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @elseif ($penginapan->agree == 2)
        <div class="alert alert-success mt-4">
            Penginapan sudah diterima
        </div>
        @else
        <div class="alert alert-danger mt-4">
            Penginapan sudah ditolak
        </div>
        @endif
    </div>

</div>


@endsection
