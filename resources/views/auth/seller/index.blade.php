@extends('layouts.admin.app')

@section('content')

<div class="container">
    <h1>Ini Index Seller</h1>
    <h2>Selamat Datang Seller "{{ auth()->guard('seller')->user()->nama }}"</h2>

    <h2><a href="{{ route('seller.kios') }}">Menu Atur Kios</a></h2>
    <h2><a href="{{ route('seller.edit') }}">Menu Atur Akun</a></h2>
    <h2> <a href="{{ route('logout') }}">Logout</a></h2>

</div>

@endsection
