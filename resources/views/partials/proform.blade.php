@csrf

  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input name ="name" type="text" class="form-control  @error('name') is-invalid @enderror " id="name" 
     value="{{ old('name')}}  @isset($user){{$user->name}} @endisset">
    @error('name')
       <span class"invalid-feedback" role="alert" >
       {{$message}}
       </span>
       @enderror
  </div>



  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input name="email" type="email" class="form-control  @error('email') is-invalid @enderror" 
     value="{{ old('email')}} @isset($user){{$user->email}} @endisset "     id="email">
    @error('email')
       <span class"invalid-feedback" role="alert" >
       {{$message}}
       </span>
       @enderror
  </div>


  <div class="mb-3">
    <label for="phone number" class="form-label">Phone number </label>
    <input name="phone_num" type="textl" class="form-control  @error('email') is-invalid @enderror" 
     value="{{ old('phone_num')}} @isset($user){{$user->phone_num}} @endisset "     id="phone_num">
    <!-- @error('email')
       <span class"invalid-feedback" role="alert" >
       {{$message}}
       </span>
       @enderror -->
  </div>


  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input name="address" type="text" class="form-control  @error('email') is-invalid @enderror" 
     value="{{ old('address')}} @isset($user){{$user->address}} @endisset "     id="address">
    <!-- @error('email')
       <span class"invalid-feedback" role="alert" >
       {{$message}}
       </span>
       @enderror -->
  </div>






  <button type="submit" class="btn btn-primary">Submit</button>