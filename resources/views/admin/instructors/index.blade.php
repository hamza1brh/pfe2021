@extends('templates.main')

@section('content')



<div class="row">
    <div class="col-12">
        <h1 class="" style="float:left;">Instructors </h1>

    </div>

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form class="d-flex mb-2 " style="float:center;">
                 <input class="form-control me-2" type="search" placeholder="search Instructors" aria-label="Search" size="">
                 <button class="btn btn-outline-primary text-blue   " type="submit">Search</button>
            </form>
        </div>
        <div class="col-3">
            <a style="float:right;" href="{{route('admin.instructors.create')}}" class="btn btn-sm btn-success p-2" role="button">Create</a>
        </div>

    </div>

</div>

<div class="card">
<table class="table">
    <thead>
        <tr>
            <th scope="col"> #Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
     @foreach($users  as $user) 
        
        @if ( $user->hasRole('instructor') )
            
            <tr>
                <th scope="row"> {{$user->id}} </th>
                    <td>{{$user->name }} </td>
                    <td>{{ $user->email }}</td>

                    <td> 
                        <a class="btn btn-primary btn-sm mx-2 " href="{{route('admin.users.edit' , $user->id)}}" role="button"> Edit </a> 
                        <a class="btn btn-info btn-sm ml-2" href="{{Route('user.profile.show', $user->id)  }}" role="button"> Profile </a> 
                            <button  type="button" class="btn btn-sm btn-danger mx-2" onclick="event.preventDefault(); 
                            document.getElementById('delete-user-form-{{$user->id}}').submit()">
                            Delete</button>
                            <form  id="delete-user-form-{{$user->id}}" action="{{route('admin.users.destroy', $user->id )}}" method="POST">
                            @csrf
                            @method("DELETE")
                            </form>

                     </td>
            </tr>  
            
            @endif
       
    @endforeach
    </tbody>

</table>





</div>






@endsection