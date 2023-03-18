@extends('layout.app')

@section('title','Contact Us')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        
      </div>
      <div class="col-5">
        <form action="{{route('storeContact')}}" method="POST" enctype="multipart/form-data" class="container bg-light rounded-4 p-5 shadow">
          @csrf
            <div class="d-flex justify-content-center">
                <h2>Contact Us</h2>
            </div>
            <br>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Subjek</label>
                <input type="text" class="form-control" name="subject">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
              </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
      </div>
      <div class="col">
        
      </div>
    </div>
  </div>

  <br>
  <hr>
@endsection