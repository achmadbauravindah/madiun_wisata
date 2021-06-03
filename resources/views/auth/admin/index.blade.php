@extends('layouts.admin.app')

@section('content')

<div class="container">
    <h1>Ini Index Admin</h1>
    <h2>Selamat Datang Admin "{{ auth()->guard('admin')->user()->nama }}"</h2>

    <h2><a href="{{ route('admin.wisatas') }}">Menu Wisata</a></h2>
    <h2><a href="{{ route('admin.mabours') }}">Menu Mabour</a></h2>
    <h2><a href="{{ route('admin.penginapans') }}">Menu Verifikasi Penginapan</a></h2>
    <h2><a href="{{ route('admin.manage-lodger') }}">Menu Manage Lodger</a></h2>
    <h2><a href="">Menu Manage Manager</a></h2>
    <h2><a href="{{ route('logout') }}">Logout</a></h2>

</div>


@endsection
