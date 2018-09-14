@extends('layouts.app')
<link rel="stylesheet" href="{{asset('my/f.css')}}">
@section('content')
<div id="demo" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        
        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/p1.jpg" width="1400" height="500">
            <div class="carousel-caption">
                    <h1>RAJAAN MOTORS</h1>
                    <p>We Give Best Service</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/car.jpg" width="1400" height="500">
            <div class="carousel-caption">
                    <h1>Does your car need a servicing?</h1>
                    <p>Join with us just now</p>
            </div>
          </div>
            <div class="carousel-item">
                    <img src="img/p3.jpg" width="1400" height="500">
                    <div class="carousel-caption">
                    <h1>Experienced. Integrity. High Quality.</h1>
                    </div>
            </div>
          </div>
        
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>  
      <div class ="container">    
        <h1><img src="img/ic.png" width="70px">{{$title}}</h1>
        <ul><p>We at Rajaan Motors offer convenient and quality driven services for vehicle.From a basic exterior wash to more specialized interior detailing, our professionally trained staff deliver exceptional results on all types of vehicles.</p></ul>
        <br><br>
        <h2><img src="img\icons8_Eye_30px_3.png"> Our Vision</h2>
        <ul><p>To be the most trusted, recognized and respected solution provider in the automobile industry in Sri Lanka</p></ul>
        <br><br>
        <h2><img src="img\icons8_Action_30px.png"> Our Mission</h2>
        <ul><p>We strive to provide the best quality automobile product and services through conveniently located Car Care Service Centre’s, at affordable prices by making our brand a consumers’ first choice for automobile product and service supports. Trust will be gained from consumers through the genuine support given to them by our skilled and dedicated service staff. We are committed to deliver our service values and we are proud of our customized service</p></ul>
        <br><br>
      </div>
@endsection