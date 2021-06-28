@extends('templates.main')
@section('content')



<div class="card"  >

<h1>Create New User :</h1>

<form method=post  action ="{{route('admin.users.store')}}">
@include('admin.users.partials.form'  , ['create'=>true ])
</form>

</div>

@endsection