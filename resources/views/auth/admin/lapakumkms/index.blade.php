@extends('layouts.admin.app')

@section('title', 'Lapak UMKM')

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

    <div class="row justify-content-between">

        {{-- SIDEBAR --}}
        @include('layouts.admin.sidebar')

        <div class="kanan col-md-8">
            <div class="custom-card p-5">
                <div class="row">
                    <!-- Pencarian -->
                    <form class="col-md-12 d-flex align-items-center pencarian" method="POST"
                        action="{{ route('lapakumkms.searchInAdmin') }}">
                        @csrf
                        @method('post')
                        <input class="form-control form-control-lg-2" type="text" placeholder="Temukan Lapakumkm"
                            aria-label="default input example" name="searchInAdmin" />
                        <!-- Button cari -->
                        <button type="submit" class="btn cta">Cari</button>
                    </form>
                    <!-- Akhir Pencarian  -->
                </div>

                <a class="cta-sm mt-3" href="{{ route('admin.lapakumkms.create') }}">Tambah Lapakumkm</a>

                @if ($lapakumkms->count()>0)
                <!-- JIKA SUDAH ADA DATA -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Tempat Lapakumkm </th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lapakumkms as $lapakumkm)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $lapakumkm->nama }}</td>
                            <td>{{ $lapakumkm->lokasi }}</td>
                            <td>
                                <a href="{{ route('admin.lapakumkms.edit', $lapakumkm->slug) }}"
                                    class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <!-- JIKA BELUM ADA DATA -->
                <div class="belum-ada-data">
                    <figure>
                        <img style="width: 80%" src="{{ asset('images/no-data.jpg') }}" alt="no-data" />
                        <figcaption style="font-size: 5pt"><a
                                href="https://www.freepik.com/free-photos-vectors/data">Data vector created by stories -
                                www.freepik.com</a></figcaption>
                    </figure>
                </div>
                @endif


            </div>
        </div>
    </div>
</div>
<!-- Akhir content -->

<!-- Footer -->
<footer class="background">
    <p>Madiunlapakumkm | 2021</p>
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
