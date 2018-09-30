@extends('layouts.log')

<link rel="stylesheet" href="{{asset('my/u.css')}}">


<div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/p2.jpg" width="1600" height="300"style = "padding-left:250px">
      <div class="carousel-caption">
              <h1>RAJAAN MOTORS</h1>
              <h2>Vehicle Details</h2>
              
      </div>
</div> 
@section('content')

<div class="newrow">
    <div class="col-lg-12 margin-tb">
        <div >
            <a class="btn btn-info" href="" style="font-size:20px" > Add New Vehicle</a> 
            <br> <br>
        </div>
    </div>
</div>

<div class="newrow">
    <div class="col-lg-12 margin-tb">
        <div class="pull-down">
            <a class="btn btn-info" href="" style="font-size:20px">View Vehicle</a>
            <br> <br>
        </div>
    </div>
</div>
<div class="newrow">
    <div class="col-lg-12 margin-tb">
        <div class="pull-down">
            <a class="btn btn-info" href="" style="font-size:20px">Edit Vehicle</a>
            <br> <br>
        </div>
    </div>
</div> 
<div class="newrow">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                    {!! Form::open(['method' => 'DELETE','style'=>'display:inline']) !!}
                    {!! Form::submit('Delete Vehicle', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                <br> <br>
            </div>
        </div>
    </div> 
@endsection

