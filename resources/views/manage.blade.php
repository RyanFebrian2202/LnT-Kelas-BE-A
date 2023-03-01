@extends('layout.app')

@section('title','Manage')

@section('content')
<div class="container m-3 d-flex flex-column">
    <div class="d-flex gap-3">
        <h3><i class="uil uil-apps"></i> Manage Books</h3>
        <a href="{{route('getBookPage')}}"><button type="button" class="btn btn-secondary">Add Books</button></a>
    </div>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Judul Buku</th>
              <th scope="col">Category</th>
              <th scope="col">Penulis</th>
              <th scope="col">Tahun</th>
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
              <td>{{$book->category->name}}</td>
              <td>{{$book->penulis}}</td>
              <td>{{$book->tahun_terbit}}</td>
              <td>
                <div style="display: flex; gap: 5px">
                  <a href="{{route('getUpdateBook',$book->id)}}">
                    <button type="button" class="btn btn-success"><i class="uil uil-edit"></i></button>
                  </a>
                  <form action="{{route('deleteBook',['id'=>$book->id])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"><i class="uil uil-trash-alt"></i></button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
</div>

<br>
<hr>
@endsection