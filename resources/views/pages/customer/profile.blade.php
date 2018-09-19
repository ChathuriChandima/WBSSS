@extends('layouts.log')

@section('content')

<img src="img/user.png" width="200px" style ="align-self: center" >
<div class = "container" style="text-align:left">
   @foreach ($customers as $customer)
   <p> {{$customer->name}} </p>
   <p> {{$customer->address}} </p>
   <p> {{$customer->contactNo}} </p>
   <p> {{$customer->email}} </p>
   @endforeach
</div>
@endsection