@extends('layouts.app')

{{-- {{dd(auth()->guard('admin')->check()) }} --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    @auth
                    <h1>Selamat Datang Admin</h1>
                    @endauth

                    Welcome Home
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
