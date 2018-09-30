@extends('layouts.new')
@section('content')
<p style="text-align:right"><b style="color:darkslategray">---You are logged in as {{ strtoupper(Auth::user()->role) }}---</p>
<h1>You are already given your details</h1>
  <div class="container">
  {!! Form::open(['action'=>'customerController@store', 'method'=>'POST']) !!}
  <p style="text-align:left"><label for="userid"><strong style="font-size:large">Customer Id :</strong></label></p>
                <input type="text" class="form-control" id="userid" placeholder={{$customer->Id}} disabled><br>
                <p style="text-align:left"><label for="name"><strong style="font-size:large">Name :</strong></label></p>
                <input type="text" class="form-control" id="name" placeholder={{$customer->name}} disabled><br>
                <p style="text-align:left"><label for="add"><strong style="font-size:large">Address :</strong></label></p>
                <input type="text" class="form-control" id="add" placeholder={{$customer->address}}  disabled><br>
                <p style="text-align:left"><label for="email"><strong style="font-size:large">Email Address :</strong></label></p>
                <input type="text" class="form-control" id="email" placeholder={{$customer->email}} disabled><br>
                <p style="text-align:left"><label for="contact"><strong style="font-size:large">Contact Number :</strong></label></p>
                <input type="number" class="form-control" id="contact" placeholder={{$customer->contactNo}} disabled><br>
{!! Form::close() !!}
</div>
@endsection
