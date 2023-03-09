@extends('layout.app')

@section('title', 'Home')

@section('style')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('content')
@if(Auth::user())
<div class="card m-3 bg-light border-0">
    <div class="card-body d-flex flex-column gap-2">
        <h2 class="card-title">Halo, {{Auth::user()->name}}</h2>
        <form action="{{route('logout')}}" method="POST" enctype="multipart/form-data" class="d-flex">
            @csrf
            <button type="submit" class="btn btn-info">Logout</button>
        </form>
    </div>
</div>
<br>
@endif
<div class="card m-3 bg-light border-0">
    <div class="card-body d-flex flex-column gap-2">
        <h2 class="card-title">Perpustakaan</h2>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
            content. This content is a little bit longer.</p>
        <a href="contact.html">
            <button type="button" class="btn btn-success btn-lg" style="width: 200px;"><i class="uil uil-phone"></i>
                Contact Us</button>
        </a>
    </div>
</div>
<br>

<div class="m-4">
    <h4><i class="uil uil-book"></i> Collection of Books</h4>
    <hr>
</div>

<section id="content">
    <div class="card-container col">
        @foreach ($books as $book)
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">{{$book->judul}}</h5>
                <div class="image-container">
                    <img src="{{asset('storage/pictures/'.$book->picture)}}" alt="picture">
                </div>
                <span class="badge bg-primary">{{$book->penulis}}</span>
                <span class="badge bg-success">{{$book->tahun_terbit}}</span>
                <p><b>Sinopsis:</b>
                    <br>
                    {{$book->sinopsis}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</section>

<hr>
@endsection