@extends('layout.app')

@section('title','Login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

        </div>
        <div class="col-5">
            <form action="{{route('login')}}" method="POST" enctype="multipart/form-data" class="container bg-light rounded-4 p-5 shadow">
                @csrf
                <div class="d-flex justify-content-center">
                    <h2>Login</h2>
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
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
