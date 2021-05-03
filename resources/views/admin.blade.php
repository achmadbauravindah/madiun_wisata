@extends('layouts.app')
{{-- @extends('layouts.auth') --}}

{{-- {{ dd(auth()->user()->nama) }} --}}
<a href="{{ route('home') }}">HOME</a>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Welcome Home
                </div>
            </div>
        </div>
    </div>
</div>
@stop
