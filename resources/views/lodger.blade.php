@extends('layouts.app')

{{-- {{ dd(auth()->user()) }} --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Hi boss Lodger!
                    <br>
                    Namamu adalah {{ request()->user()->nama }}
                    <br>
                    No Ktpmu adalah {{ auth()->user()->nik }}

                    {{-- {{ user() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
