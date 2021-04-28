@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Hi boss Lodger!
                    <br>
                    Namamu adalah {{ Auth::user()->name }}
                    <br>
                    No Ktpmu adalah {{ Auth::user()->no_ktp }}

                    {{-- {{ user() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
