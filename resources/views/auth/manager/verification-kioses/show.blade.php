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

    <h1>Verifikasi Kios</h1>

    <div class="table-responsive py-4">
        <h3>Identitas Seller</h3>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nama</label>
                <p class="form-control" readonly>{{$kios->seller->nama}}</p>
            </div>
            <div class="col-md-6    ">
                <label for="" class="form-label">Scan KTP</label>
                <p class="form-control"><img src="{{asset("storage/".$kios->seller->ktp_img)}}" alt="Scan KTP"
                        style="width: 20rem; height:auto;">
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">email</label>
            <p class="form-control" readonly>{{$kios->seller->email}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">nik</label>
            <p class="form-control" readonly>{{$kios->seller->nik}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">no_wa</label>
            <p class="form-control" readonly>{{$kios->seller->no_wa}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">alamat</label>
            <p class="form-control" readonly>{{$kios->seller->alamat}}</p>
        </div>

        <h3>Identitas kios</h3>
        <div class="row g-3">
            @if ($kios->no_kios)
            <div class="col-md-6">
                <label class="form-label">Nomer Kios</label>
                <h6 class="form-control" readonly>{{$kios->no_kios}}</h6>
            </div>
            @endif

            <div class="col-md-6">
                <label class="form-label">Nama</label>
                <p class="form-control" readonly>{{$kios->nama}}</p>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Foto kios</label>
                <p class="form-control"><img src="{{asset("storage/".$kios->foto)}}" alt="Gambar kios"
                        style="width: 20rem; height:auto;">
                </p>
            </div>
        </div>

        @if ($kios->agree == 1)
        <h2>Keputusan</h2>
        <form action="{{ route('manager.kioses.verification', $kios->slug) }}" method="post">
            @csrf
            @method('patch')
            <div class="col-md-6">
                @if(session()->has('no_kios'))
                <div class="alert alert-danger mt-4">
                    {{ session()->get('no_kios') }}
                </div>
                @endif
                <label class="form-label">No Kios</label>
                <input class="form-control" name='no_kios'>
            </div>
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
        @elseif ($kios->agree == 2)
        <div class="alert alert-success mt-4">
            kios sudah diterima
        </div>
        @else
        <div class="alert alert-danger mt-4">
            kios sudah ditolak
        </div>
        @endif

    </div>

</div>


@endsection
