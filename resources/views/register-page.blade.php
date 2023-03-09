@extends('layout.app')

@section('title','Register')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

        </div>
        <div class="col-5">
            <form action="{{route('register')}}" method="POST" enctype="multipart/form-data" class="container bg-light rounded-4 p-5 shadow">
                @csrf
                <div class="d-flex justify-content-center">
                    <h2>Register</h2>
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('name')}}">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">DOB</label>
                    <input type="date" name="dob" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('dob')}}">
                </div>
                @error('dob')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Birth Place</label>
                    <input type="text" name="birthPlace" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('birthPlace')}}">
                </div>
                @error('birthPlace')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Gender</label> <br>
                      <input type="radio" id="html" name="gender" value="Male" >
                      <label for="html">Male</label><br>
                      <input type="radio" id="css" name="gender" value="Female">
                      <label for="css">Female</label><br>
                </div>
                @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" value="{{old('password')}}">
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}">
                </div>
                @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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
