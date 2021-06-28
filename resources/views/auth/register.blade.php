@extends('templates.main')
@section('content')

<h1>Register</h1>

<form method=post  action ="{{route('register')}}">
@csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input name ="name" type="text" class="form-control  @error('name') is-invalid @enderror " id="name"  value="{{ old('name')}}">
    @error('name')
       <span class"invalid-feedback" role="alert" >
       {{$message}}
       </span>
       @enderror
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input name="email" type="email" class="form-control  @error('email') is-invalid @enderror"  value="{{ old('email')}}"  id="email">
    @error('email')
       <span class"invalid-feedback" role="alert" >
       {{$message}}
       </span>
       @enderror
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
    @error('password')
       <span class"invalid-feedback" role="alert" >
       {{$message}}
       </span>
       @enderror
  </div>

  <div class="mb-3">
    <label for="password-confirmation" class="form-label">Password confirmation</label>
    <input  name= "password_confirmation" type="password" class="form-control" id="password-confirmation">
  </div>
 
  <button type="submit" class="btn btn-primary">Register</button>
</form>


@endsection