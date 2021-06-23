@extends('layouts.seller.app')

@section('title', 'Edit Kios')

@section('header')
<!-- Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<!-- AOS Animasi -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- custom CSS -->
<link rel="stylesheet" href="{{ asset('css/crudpage.css') }}" />
@endsection

@section('content')

<!-- Content -->
<div class="container content">

    <div class="row justify-content-between">

        {{-- SIDEBAR --}}
        @include('layouts.seller.sidebar')

        <div class="kanan col-md-8">

            <div class="custom-card p-5">
                <div class="d-flex justify-content-end">
                    <a class="cta-sm" href="{{ route('seller') }}">Back</a>
                </div>
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

                @error('nama')
                <div class="alert alert-danger mt-4">
                    {{ "Maaf harap isi bidang nama" }}
                </div>
                @enderror
                @error('harga')
                <div class="alert alert-danger mt-4">
                    {{ "Maaf harap isi bidang harga" }}
                </div>
                @enderror
                @error('jenis_menu')
                <div class="alert alert-danger mt-4">
                    {{ "Maaf harap isi bidang jenis menu" }}
                </div>
                @enderror

                <form class="form-crud row g-3" method="post" action="{{ route('kios.update', $kios->slug) }}">
                    @csrf
                    @method('patch')
                    <div class="col-md-12">
                        <label for="nama" class="form-label">Nama Kios</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $kios->nama }}" />
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn cta-sm">Ubah Nama</button>
                    </div>
                </form>

                @forelse ($menus as $menu)
                <form class="form-crud row g-3 mt-3" action="{{route('menus.update', $menu->id)}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="col-md-4">
                        <label for="nama" class="form-label">Menu</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $menu->nama }}" />
                    </div>
                    <div class="col-md-4">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ $menu->harga }}" />
                    </div>
                    <div class="col-md-4">
                        <label for="jenis_menu" class="form-label">Jenis </label>
                        <select id="jenis_menu" class="form-select" name="jenis_menu" value="{{ $menu->jenis_menu }}">
                            @if ($menu->jenis_menu == 1)
                            <option value="1">Makanan</option>
                            <option value="0">Minuman</option>
                            @else
                            <option value="0">Minuman</option>
                            <option value="1">Makanan</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" value="Update" name="update" class="btn btn-success">Update Menu</button>
                        <button type="submit" value="Delete" name="delete" class="btn btn-danger">Delete Menu</button>
                    </div>
                </form>
                @empty
                <div class="belum-ada-data text-center">
                    <figure>
                        <img style="width: 30%" src="{{ asset('images/no-data.jpg') }}" alt="no-data" />
                        <h5>Anda belum memiliki menu</h5>
                        <h5>Tambahkan sekarang!!!</h5>
                        <figcaption style="font-size: 5pt"><a
                                href="https://www.freepik.com/free-photos-vectors/data">Data vector
                                created by stories -
                                www.freepik.com</a></figcaption>
                    </figure>
                </div>
                @endforelse

                @if ($kios->agree == 2)
                <form class="form-crud row g-3 mt-3" action="{{route('menus.store')}}" method="POST">
                    @csrf
                    <div class="col-md-4">
                        <label for="nama" class="form-label">Menu</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" />
                    </div>
                    <div class="col-md-4">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ old('harga') }}" />
                    </div>
                    <div class="col-md-4">
                        <label for="jenis_menu" class="form-label">Jenis </label>
                        <select id="jenis_menu" class="form-select" name="jenis_menu">
                            <option value="1">Makanan</option>
                            <option value="0">Minuman</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Tambah Menu</button>
                    </div>
                </form>
                @endif
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
