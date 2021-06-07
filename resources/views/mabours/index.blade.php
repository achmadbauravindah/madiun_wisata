@extends('layouts/app')

@section('title', 'Wisata')

@section('header')
<!-- Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
<!-- AOS Animasi -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- custom CSS -->
<link rel="stylesheet" href="{{ asset('css/lapakumkm.css') }}" />
@endsection

@section('content')

<main class="atas">
    <!-- Daftar keseluruhan BUS-->
    <div class="container lapak">
        <div class="row justify-content-between">
            <div class="kiri col-md-12">
                <h2 class="text-center">Mabour (Madiun Bus On Tour)</h2>
                <img class="mx-auto d-block gambarlapak" src="{{ asset('images/mabour/mabor1.jpg') }}"
                    alt="sumber wangi" />
                <!-- Card per BUS -->
                <div class="card mb-3 custom-card">
                    <div class="row g-0">
                        <div class="card-body">
                            @foreach ($buses as $bus)
                            {{-- START BUS --}}
                            <h5 class="card-title judul text-center">{{ $bus->nama }}</h5>
                            <div class="container">
                                <div class="row">

                                    @for ($i = 0; $i < $bus->putaran; $i++)
                                        <!-- Data per putaran -->
                                        <div class="col-md-6">
                                            <h6>Putaran {{ $i+1 }}</h6>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Titik Singgah</th>
                                                        <th scope="col">Jam Tiba</th>
                                                        <th scope="col">Jam Berangkat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($tours as $tour)
                                                    <tr>
                                                        @if ($loop->index == 0 and $i == 0)
                                                        @php
                                                        // Berangkat = Jam Berangkat Bus
                                                        $waktu_berangkat = $bus->jam_berangkat;
                                                        @endphp
                                                        <td>{{$tour->nama}}</td>
                                                        <td> - </td>
                                                        <td>{{ $waktu_berangkat }}</td>
                                                        @else
                                                        {{-- Karena $tours_before butuh $loop->index yang sudah iterasi(1) di if pertama --}}
                                                        @if ($i != 0)
                                                        @php
                                                        $loop->index = $loop->index +1
                                                        @endphp
                                                        @endif
                                                        @php
                                                        // Untuk mengambil data sebelumnya
                                                        $tours_before = $tours[$loop->index-1]->berjalan;
                                                        // Hitung Tiba dan Berangkat
                                                        $waktu_tiba = strtotime("+ $tours_before minutes",
                                                        strtotime($waktu_berangkat));
                                                        $waktu_tiba= date('h:i:s',$waktu_tiba);
                                                        $waktu_berangkat = strtotime("+ $tour->berhenti minutes",
                                                        strtotime($waktu_tiba));
                                                        $waktu_berangkat= date('h:i:s',$waktu_berangkat);
                                                        @endphp

                                                        @if ($i == 0)
                                                        <td>{{$tour->nama}}</td>
                                                        <td> {{ $waktu_tiba }} </td>
                                                        <td>{{ $waktu_berangkat }}</td>
                                                        @else
                                                        <td>{{$tour->nama}}</td>
                                                        <td> {{ $waktu_tiba }} </td>
                                                        <td>{{ $waktu_berangkat }}</td>
                                                        @endif
                                                        @endif
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- akhir data per putaran -->
                                        @endfor
                                </div>
                            </div>
                            {{-- ENDBUS --}}
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Akhir card per BUS-->
            </div>
            <!-- Akhir daftar keseluruhan BUS -->
        </div>
    </div>
</main>

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
