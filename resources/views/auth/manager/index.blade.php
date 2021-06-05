@extends('layouts.admin.app')

@section('content')

<div class="container">
    <h1>Ini Index Manager</h1>
    <h2>Selamat Datang Lodger "{{ auth()->guard('manager')->user()->nama }}"</h2>

    <h2><a href="{{ route('manager.lapakumkm') }}">Menu Atur Lapak UMKM</a></h2>
    <h2><a href="{{ route('manager.kioses') }}">Menu Verifikasi Kios</a></h2>
    <h2><a href="{{ route('manager.edit') }}">Menu Atur Akun</a></h2>
    <h2> <a href="{{ route('logout') }}">Logout</a></h2>

</div>

@endsection
