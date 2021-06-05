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
    <h1>Edit kios</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update kios: {{ $kios->nama }}</div>

                <div class="card-body">
                    <form action="{{ route('kios.update', $kios->slug) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="nama">Nomer kios</label>
                            <p>{{ $kios->no_kios }}</p>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama kios</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ old('nama')??$kios->nama }}">
                            @error('nama')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto kios</label>
                            <input type="file" name="foto" id="foto" class="form-control" value="{{ old('foto') }}">
                            {{-- old('...') digunakan untuk mengambil value yang terkahir di masukan --}}
                            @error('foto')
                            <div class="mt-2 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2 class="mt-5">Ubah Menu</h2>
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Nama Menu</th>
            <th>Jenis Menu</th>
            <th>Harga</th>
        </tr>
        @foreach ($menus as $menu)
        <tr>
            <td>{{$loop->index+1}}</td>
            {{-- Update menus --}}
            <form action="{{route('menus.update', $menu->id)}}" method="POST">
                @method('put')
                @csrf
                <td><input type="text" value="{{$menu->nama}}" name="nama" class="form-control"></td>
                <td>
                    <select name="jenis_makanan" id="jenis_menu">
                        @if ($menu->jenis_makanan == 0)
                        <option value="0">Makanan</option>
                        <option value="1">Minuman</option>
                        @else
                        <option value="1">Minuman</option>
                        <option value="0">Makanan</option>
                        @endif
                    </select>
                </td>
                <td><input type="text" value="{{$menu->harga}}" name="harga" class="form-control"></td>
                <td>
                    <input type="submit" value="Update" name="update" class="btn btn-success">
                    <input type="submit" value="Delete" name="delete" class="btn btn-danger">
                </td>

            </form>
        </tr>
        @endforeach
        {{-- Create menus --}}
        <tr>
            <td>#</td>
            <form action="{{route('menus.store')}}" method="POST">
                @csrf
                <td><input type="text" name="nama" class="form-control" placeholder="Nama Menu (Ayam)"></td>
                <td>
                    <select name="jenis_makanan" id="jenis_menu">
                        <option value="0">Makanan</option>
                        <option value="1">Minuman</option>
                    </select>
                </td>
                <td><input type="text" name="harga" class="form-control" placeholder="Harga"></td>
                <td><button type="submit" class="btn bg-primary text-light">Create New</button></td>
            </form>
        </tr>
    </table>

</div>



@endsection()
