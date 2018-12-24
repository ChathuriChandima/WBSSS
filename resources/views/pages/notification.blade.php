@extends('layouts.log')

<link rel="stylesheet" href="{{asset('my/m.css')}}">

<div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/p2.jpg" width="1600" height="300"style = "padding-left:250px">
      <div class="carousel-caption">
              <h1>RAJAAN MOTORS</h1>
              <h2>Vehicle Details</h2>

      </div>
</div>
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
            <a href="add_vehicle" class="btn float-right"  title="New Vehicle"> <img src="img\icons8_Add_New_50px_1.png"  /></a>
    </div>
</div>
@section('content')



<p>Notification and All other setings about notification comes here</p>



@endsection
