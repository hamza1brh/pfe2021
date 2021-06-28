@extends('templates.main')

@section('content')



<div class="row">
    <div class="col-12">
        <h1 class="" style="float:left;">All Users </h1>
        <a style="float:right;" href="{{route('admin.users.create')}}" class="btn btn-sm btn-success p-2" role="button">Create</a>
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
        <tr>
            <th scope="row"> {{$user->id}} </th>
            <td>{{$user->name }} </td>
            <td>{{ $user->email }}</td>

            <td> 
                    <a class="btn btn-primary btn-sm" href="{{route('admin.users.edit' , $user->id)}}" role="button"> Edit </a> 
                    <a class="btn btn-info btn-sm ml-2" href="{{Route('user.profile.show', $user->id)  }}" role="button"> Profile </a> 
                    <button type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault(); 
                    document.getElementById('delete-user-form-{{$user->id}}').submit()">
                    Delete</button>
                    <form  id="delete-user-form-{{$user->id}}" action="{{route('admin.users.destroy', $user->id )}}" method="POST">
                      @csrf
                      @method("DELETE")
                    </form>

            </td>
        </tr>
    @endforeach
    </tbody>

</table>
{{$users->links()}}




</div>






@endsection