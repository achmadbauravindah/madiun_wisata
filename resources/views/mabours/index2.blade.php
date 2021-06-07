@extends('layouts.app')


@section('content')
<div class="container py-4" style="margin-left: 40vh">
    <h1>Mabour</h1>
    <div class="table-responsive">

        @foreach ($buses as $bus)
        <h3>Bus {{ $loop->index+1 }}</h3>

        <table class="table table-striped">
            <th>#</th>
            <th>Titik Singgah</th>
            <th>Tiba</th>
            <th>Berangkat</th>
            </tr>
            @for ($i = 0; $i < $bus->putaran; $i++) <tr>
                    <th>Putaran {{ $i+1 }}</th>
                    @foreach ($tours as $tour)
                <tr>
                    @if ($loop->index == 0 and $i == 0)
                    @php
                    // Berangkat = Jam Berangkat Bus
                    $waktu_berangkat = $bus->jam_berangkat;
                    @endphp

                    {{-- View --}}
                    <td>{{$loop->index+1}}</td>
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
                    $waktu_tiba = strtotime("+ $tours_before minutes", strtotime($waktu_berangkat));
                    $waktu_tiba= date('h:i:s',$waktu_tiba);
                    $waktu_berangkat = strtotime("+ $tour->berhenti minutes", strtotime($waktu_tiba));
                    $waktu_berangkat= date('h:i:s',$waktu_berangkat);
                    @endphp

                    @if ($i == 0)
                    {{-- View --}}
                    <td>{{$loop->index+1}}</td>
                    <td>{{$tour->nama}}</td>
                    <td>{{ $waktu_tiba }}</td>
                    <td>{{ $waktu_berangkat }}</td>
                    @else
                    {{-- View --}}
                    <td>{{$loop->index}}</td>
                    <td>{{$tour->nama}}</td>
                    <td>{{ $waktu_tiba }}</td>
                    <td>{{ $waktu_berangkat }}</td>
                    @endif

                    @endif
                </tr>
                @endforeach
                @endfor
        </table>
        @endforeach
    </div>
</div>
@endsection
