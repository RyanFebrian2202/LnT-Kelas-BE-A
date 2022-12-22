@extends('layout.app')

@section('title','Manage')

@section('content')
<div class="container m-3 d-flex flex-column">
    <div class="d-flex gap-3">
        <h3><i class="uil uil-apps"></i> Manage Books</h3>
        <a href="{{route('createBookPage')}}"><button type="button" class="btn btn-secondary">Add Books</button></a>
    </div>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Judul Buku</th>
              <th scope="col">Tahun Terbit</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php
                $nomor = 1;
            @endphp
            @foreach ($books as $book)
            <tr>
              <th scope="row">{{$nomor++}}</th>
              <td>{{$book->judul}}</td>
              <td>{{$book->tahun_terbit}}</td>
              <td>
                <button type="button" class="btn btn-success"><i class="uil uil-edit"></i></button>
                <button type="button" class="btn btn-danger"><i class="uil uil-trash-alt"></i></button>
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
</div>

<br>
<hr>
@endsection