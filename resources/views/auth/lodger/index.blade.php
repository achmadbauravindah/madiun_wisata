@extends('layouts.admin.app')

@section('content')

<div class="container">
    <h1>Ini Index Lodger</h1>
    <h2>Selamat Datang Lodger "{{ auth()->guard('lodger')->user()->nama }}"</h2>

    <h2><a href="{{ route('lodger.penginapans') }}">Menu Atur Penginapan</a></h2>
    <h2><a href="{{ route('lodger.edit') }}">Menu Atur Akun</a></h2>
    <h2> <a href="{{ route('logout') }}">Logout</a></h2>


</div>

@endsection
