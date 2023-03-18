@extends('layout.app')

@section('title','Manage')

@section('content')
<div class="container m-3 d-flex flex-column">
    <div class="d-flex gap-3">
        <h3><i class="uil uil-apps"></i> Manage Tags</h3>
        <a href="{{route('getBookPage')}}"><button type="button" class="btn btn-secondary">Add Tags</button></a>
    </div>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Tags</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @php
                $nomor = 1;
            @endphp
            @foreach ($categories as $category)
            <tr>
              <th scope="row">{{$nomor++}}</th>
              <td>{{$category->name}}</td>
              <td>
                <div style="display: flex; gap: 5px">
                  <a href="">
                    <button type="button" class="btn btn-success"><i class="uil uil-edit"></i></button>
                  </a>
                  <form action="{{route('deleteCategory',['id'=>$category->id])}}" method="POST">
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