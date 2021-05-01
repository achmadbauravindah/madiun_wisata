{{-- Dibawah ini akan mengirimkan data title ke layouts/app --}}
@extends('layouts/app', ['title' => 'Update post'])



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update post: {{ $post->title }}</div>

                <div class="card-body">

                    <form action="/posts/{{ $post->slug }}/edit" method="post">
                        {{-- Agar form yang dibaca HTML 5 bisa support terhadapp method put atau patch --}}
                        @method('patch')
                        {{-- Untuk DEBUG Post @csrf --}}
                        @csrf
                        {{-- Isi dari semua form berada pada file form-control --}}
                        @include('posts.partials.form-control', ['submit'=>'Update'])
                    </form>

                </div>


            </div>
        </div>

    </div>
</div>



@stop()
