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

  @isset($edit)
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
  @endisset

  @isset($create)
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
    <label for="password_confirmation" class="form-label">Password Confirm</label>
    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
    @error('password_confirmation')
       <span class"invalid-feedback" role="alert" >
       {{$message}}
       </span>
       @enderror
  </div>


  @endisset





@can('is-admin')
<div class="mb-3">
    @foreach($roles as $role)
        <div class="form-check">
            <input class="form-check-input" name="roles[]" type="checkbox"  value="{{$role->id}}"  id ="{{$role->name}}" 
            @isset($instructor )@if( $role->name == 'instructor') checked @endif @endisset
            @isset($user) @if(in_array($role->id,$user->roles->pluck('id')->toArray())) checked   @endif     @endisset>
            <label class="form-check-label"   for="{{$role->name}}"> {{$role->name}}</label>
        </div>
    @endforeach
</div>
@endcan

  <button type="submit" class="btn btn-primary">Submit</button>