@extends('layouts.app')

{{-- Ini terlalu ga rapi (harusnya navigasi ada di file app), ganti kalo nemu cara lain --}}
@section('navigation')
@if(request()->is('admin/*') and auth()->user())
@include('layouts.navigation_admin')
@elseif (!auth()->user())
@include('layouts.navigation')
@endif
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Penginapan</div>

                <div class="card-body">
                    Selamat Datang Lodger, Silahkan Pilih
                    <br>
                    <a href="/login/lodger">Login Lodgers</a>
                    <br>
                    <a href="/register/lodger">Sign Up Lodgers</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
