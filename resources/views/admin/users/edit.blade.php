@extends('templates.main')
@section('content')



<div class="card"  >

<h1>Edit User : {{$user->name}}</h1>

<form method=post  action ="{{route('admin.users.update', $user->id)}}">
@method('PATCH')


@include('admin.users.partials.form', ['edit'=>true])
</form>

</div>

@endsection