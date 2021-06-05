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

    <h1>Lihat Manager</h1>

    <div class="table-responsive py-4">
        <h3>Identitas Manager</h3>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nama</label>
                <p class="form-control" readonly>{{$manager->nama}}</p>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Scan KTP</label>
                <p class="form-control"><img src="{{asset("storage/".$manager->ktp_img)}}" alt="Scan KTP"
                        style="width: 20rem; height:auto;">
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">email</label>
            <p class="form-control" readonly>{{$manager->email}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">nik</label>
            <p class="form-control" readonly>{{$manager->nik}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">no_telp</label>
            <p class="form-control" readonly>{{$manager->no_telp}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">no_wa</label>
            <p class="form-control" readonly>{{$manager->no_wa}}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label">alamat</label>
            <p class="form-control" readonly>{{$manager->alamat}}</p>
        </div>

        <div>
            <form action="{{ route('manager.delete', $manager->id) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Delete Account</button>
            </form>
        </div>


    </div>
    <div>
        Nanti disini buat link ke informasi lapak jika dia punya lapak
    </div>
</div>

</div>
@endsection
