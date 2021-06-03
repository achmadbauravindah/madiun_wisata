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

    <h1>Edit Jadwal Mabour</h1>
    {{-- BUS --}}
    <div class="table-responsive">
        <h2 class="mt-5">Ubah Bus</h2>
        @foreach ($buses as $bus)
        <h3>Bus {{ $loop->index+1 }}</h3>
        <h6>Jam Berangkat : {{ $bus->jam_berangkat }}</h6>
        {{-- Update Bus --}}
        <form action="{{route('buses.update', $bus->id)}}" method="POST">
            @method('put')
            @csrf
            <tr>
                <td><input type="text" name="nama" value="{{$bus->nama}}"></td>
                <td><input type="text" name="putaran" value="{{$bus->putaran}}"></td>
                <td><input type="time" name="jam_berangkat" value="{{$bus->jam_berangkat}}"></td>
                <td><input type="submit" value="Update" name="update" class="btn btn-success"></td>
                <td><input type="submit" value="Delete" name="delete" class="btn btn-danger"></td>
            </tr>
        </form>
        @endforeach
        {{-- Create Bus --}}
        <tr>
            <h6 class="mt-3">Tambah Bus</h6>
            <form action="{{route('buses.store')}}" method="POST">
                @csrf
                <td><input type="text" name="nama" placeholder="Nama Bus"></td>
                <td><input type="number" name="putaran" placeholder="Jumlah Putaran"></td>
                <td><input type="time" name="jam_berangkat" placeholder="Nama Tempat Singgah"></td>
                <td><button type="submit" class="btn bg-primary text-light">Create New</button></td>
            </form>
        </tr>
        {{-- ENDBUS --}}

        {{-- TOURS --}}
        <h2 class="mt-5">Ubah Tours</h2>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Nama Tempat</th>
                <th>Waktu Berhenti (menit)</th>
                <th>Waktu Berjalan (menit)</th>
                <th>Aksi</th>
            </tr>
            @foreach ($tours as $tour)
            <tr>
                <td>{{$loop->index+1}}</td>
                {{-- Update Tours --}}
                <form action="{{route('tours.update', $tour->id)}}" method="POST">
                    @method('put')
                    @csrf
                    <td><input type="text" value="{{$tour->nama}}" name="nama" class="form-control"></td>
                    <td><input type="text" value="{{$tour->berhenti}}" name="berhenti" class="form-control"></td>
                    <td><input type="text" value="{{$tour->berjalan}}" name="berjalan" class="form-control"></td>
                    <td>
                        <input type="submit" value="Update" name="update" class="btn btn-success">
                        <input type="submit" value="Delete" name="delete" class="btn btn-danger">
                    </td>
                </form>
            </tr>
            @endforeach
            {{-- Create Tours --}}
            <tr>
                <td>#</td>
                <form action="{{route('tours.store')}}" method="POST">
                    @csrf
                    <td><input type="text" name="nama" class="form-control" placeholder="Nama Tempat Singgah"></td>
                    <td><input type="text" name="berhenti" class="form-control" placeholder="Waktu Singgah"></td>
                    <td><input type="text" name="berjalan" class="form-control" placeholder="Waktu Perjalanan"></td>
                    <td><button type="submit" class="btn bg-primary text-light">Create New</button></td>
                </form>
            </tr>
        </table>
        <p> NB:</p>
        <p> Waktu Singgah = Waktu Berhenti Bus pada titik singgah</p>
        <p> Waktu Perjalanan = Waktu perjalanan Bus ke tempat singgah yang lain</p>
        {{-- END TOURS --}}
    </div>
</div>
@endsection
