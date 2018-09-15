@extends('layouts.app')
<link rel="stylesheet" href="{{asset('my/s.css')}}">
@section('content')
<img src="img/car.jpg" width="1400px" height="300px">
<div class ="container"> 
    <h1><img src="img/ic.png" width="70px">{{$title}}</h1>
    <br><br><br>
    <div class="card-columns">
            <div class="card bg-light">
                <h4 class="card-title text-muted">Full Service</h4>
                <img class="card-img-top" src="img/full.jpg" alt="Card image" style="width:100%">
              <div class="card-body text-center">
                <p class="card-text text-muted">LUBRICATION<br>UNDERCARRIAGE DEGREASING<br>VACUUMING<br>TYRE & DASH DRESSING<br>EXTERIOR WAXING<br>WINDSCREEN & GLASS CLEANING<br>VISUAL SAFETY CHECK</p>
              </div>
            </div>
            <div class="card bg-light">
                <h4 class="card-title text-muted">Car Wash</h4>
                <img class="card-img-top" src="img/full.jpg" alt="Card image" style="width:100%">
              <div class="card-body text-center">
                <p class="card-text text-muted">Regular maintenance of the exterior of your vehicle is very important regardless of the type or age of your vehicle. Which is why we know how to groom it so it looks like new. Our thorough, professional cleaning not only makes a visual difference but is also a precaution, preserving vehicle paintwork and keeping damaging environmental influences at bay.</p>
              </div>
            </div>
            
          </div>
</div>

<br><br>
@endsection