@extends('templates.main')
@section('content')

<div class="row">
<div class="col-1"></div>
<div class="card col-10"  >
<!-- @can('is-admin')
<h1>Edit User : {{$user->name}}</h1>
@endcan -->


<h1>Public Profile :</h1>

<form method=post  action ="{{route('user.profile.update', $user->id)}}" enctype="multipart/form-data">
@method('PATCH')
<div class="d-flex flex-column align-items-center text-center">
     <img src="{{Storage::url($user->profile->path)}}" alt="Admin" class="rounded-circle" width="150">
          <div class="mt-3">

                 
                 <div class="mb-3 btn btn-secondary">
                      <input type="file" id="img"   name="path" accept="image/*">
                </div>
                

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name ="title" type="text" class="form-control  " id="title" 
                          value="{{ old('title')}}  @isset($user){{$user->profile->title}} @endisset">
                  </div>

          </div>
</div>

@include('partials.proform', ['edit'=>true])
</form>

</div>


</div>
@endsection