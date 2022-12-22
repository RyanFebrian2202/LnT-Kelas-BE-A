@extends('layout.app')

@section('title', 'Home')

@section('content')
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

<div class="row row-cols-1 row-cols-md-3 g-4 m-2 mb-5">
    <div class="col">
        @foreach ($books as $book)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$book->judul}}</h5>
                <span class="badge bg-primary">{{$book->penulis}}</span>
                <span class="badge bg-primary">{{$book->tahun_terbit}}</span>
                <p class="card-text">{{$book->sinopsis}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<hr>
@endsection