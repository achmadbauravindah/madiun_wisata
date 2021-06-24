@extends('layouts.admin.app')

@section('title', 'Admin')

@section('header')
<!-- Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome.min.css" />
<!-- AOS Animasi -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- font awesome icon -->
<script src="https://kit.fontawesome.com/f8dd01d0f4.js" crossorigin="anonymous"></script>
<!-- custom CSS -->
<link rel="stylesheet" href="{{ asset('css/crudpage.css') }}" />
@endsection

@section('content')

<!-- Content -->
<div class="container content">

    <div class="row justify-content-between">

        {{-- SIDEBAR --}}
        @include('layouts.admin.sidebar')

        <div class="kanan col-md-8">
            <div class="custom-card p-5 form-crud">

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

                <!-- Ubah Bus -->
                <h5>Ubah Bus</h5>
                @foreach ($buses as $bus)
                <h6 class="mt-3">Bus {{ $loop->index+1 }}</h6>
                <p>Jam Berangkat: 21:37:00</p>
                <form action="{{route('buses.update', $bus->id)}}" method="POST" class="form-crud row g-1">
                    @method('put')
                    @csrf
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="name" name="nama" value="{{$bus->nama}}" />
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="jumlah" name="putaran" value="{{$bus->putaran}}" />
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="jam" name="jam_berangkat"
                            value="{{$bus->jam_berangkat}}" />
                    </div>
                    <div class="col-2">
                        <button type="submit" value="Update" name="update" class="btn btn-success">Update</button>
                    </div>
                    <div class="col-2">
                        <button type="submit" value="Delete" name="delete" class="btn btn-danger">Delete</button>
                    </div>
                </form>
                @endforeach
                <!-- Akhir Ubah Bus -->

                <!-- Tambah Bus Baru -->
                <h5 class="mt-5">Tambah Bus</h5>
                <form action="{{route('buses.store')}}" method="POST" class="form-crud row g-1">
                    @csrf
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="name" name="nama" placeholder="Nama Bus" />
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="jumlah" name="putaran"
                            placeholder="Jumlah Putaran" />
                    </div>
                    <div class="col-md-2">
                        <input type="time" class="form-control" id="jam" name="jam_berangkat" placeholder="Berangkat" />
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary">Create New</button>
                    </div>
                </form>
                <!-- Akhri Tambah Bus Baru -->

                <!-- Tambah Tours -->
                <h5 class="mt-5">Tours</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Tempat</th>
                            <th scope="col">Waktu Berhenti</th>
                            <th scope="col">Waktu Berjalan</th>
                            <th colspan="2" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tours as $tour)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <form action="{{route('tours.update', $tour->id)}}" method="POST">
                                @method('put')
                                @csrf
                                <td>
                                    <input type="text" class="form-control form-control-sm" value="{{$tour->nama}}"
                                        name="nama" id="tempat" />
                                </td>
                                <td>
                                    <input type="text" value="{{$tour->berhenti}}" name="berhenti"
                                        class="form-control form-control-sm" id="berhenti" />
                                </td>
                                <td>
                                    <input type="text" value="{{$tour->berjalan}}" name="berjalan"
                                        class="form-control form-control-sm" id="berjalan" />
                                </td>

                                <td>
                                    <button type="submit" value="Update" name="update"
                                        class="btn btn-success btn-sm">Update</button>
                                </td>
                                <td>
                                    <button type="submit" value="Delete" name="delete"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                        <tr>
                            <th scope="row">#</th>
                            <form action="{{route('tours.store')}}" method="POST">
                                @method('post')
                                @csrf
                                <td>
                                    <input type="text" name="nama" class="form-control form-control-sm" id="tempat"
                                        placeholder="Nama Tempat Singgah" />
                                </td>
                                <td>
                                    <input type="text" name="berhenti" class="form-control form-control-sm"
                                        id="berhenti" placeholder="Waktu Singgah" />
                                </td>
                                <td>
                                    <input type="text" name="berjalan" class="form-control form-control-sm"
                                        id="berjalan" placeholder="Waktu Perjalanan" />
                                </td>

                                <td colspan="2">
                                    <button type="submit" class="btn btn-primary btn-sm">Create</button>
                                </td>
                            </form>
                        </tr>
                    </tbody>
                </table>
                <!-- Akhir Tambah Tours -->
            </div>
        </div>
    </div>
</div>
<!-- Akhir content -->

<!-- Footer -->
<footer class="background">
    <p>MadiunWisata | 2021</p>
</footer>
<!-- Akhir Footer -->

@endsection()

@section('script')
<!-- AOS Animasi -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endsection
