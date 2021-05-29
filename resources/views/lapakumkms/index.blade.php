@extends('layouts/app', ['title' => 'Tambah penginapan'])


{{-- @section('title', 'Create Post') --}}

@section('content')
@if (session()->has('success'))
{{ request()->session()->get('success') }}
@endif
<div class="container mt-5">
    Cek Mudun
</div>
<div class="container mt-5">

</div>
@endsection
