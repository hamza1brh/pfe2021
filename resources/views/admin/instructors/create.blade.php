@extends('templates.main')
@section('content')



<div class="card"  >

<h1>Create New Instructor:</h1>

<form method=post  action ="{{route('admin.users.store')}}">
@include('admin.users.partials.form'  , ['create'=>true , 'instructor' => true] )
</form>

</div>

@endsection
