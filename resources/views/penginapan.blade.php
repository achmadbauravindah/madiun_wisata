@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Penginapan</div>

                <div class="card-body">
                    Selamat Datang Lodger, Silahkan Pilih
                    <br>
                    <a href="{{ route('showLodgerLoginForm') }}">Login Lodgers</a>
                    <br>
                    <a href="{{ route('showLodgerRegisterForm') }}">Sign Up Lodgers</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
