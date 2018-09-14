@extends('layouts.app')
<link rel="stylesheet" href="{{asset('my/s.css')}}">
@section('content')
<img src="img/car.jpg" width="1400px" height="300px">
<div class ="container"> 
    <h1><img src="img/ic.png" width="70px">{{$title}}</h1>
    <div class="card-columns">
            <div class="card bg-light">
                <img class="card-img-top" src="img/full.jpg" alt="Card image" style="width:100%">
              <div class="card-body text-center">
                <p class="card-text">Some text inside the first card</p>
              </div>
            </div>
            <div class="card bg-light">
              <div class="card-body text-center">
                <p class="card-text">Some text inside the second card</p>
              </div>
            </div>
            <div class="card bg-light">
              <div class="card-body text-center">
                <p class="card-text">Some text inside the third card</p>
              </div>
            </div>
            <div class="card bg-light">
              <div class="card-body text-center">
                <p class="card-text">Some text inside the fourth card</p>
              </div>
            </div>  
            <div class="card bg-light">
              <div class="card-body text-center">
                <p class="card-text">Some text inside the fifth card</p>
              </div>
            </div>
            <div class="card bg-light">
              <div class="card-body text-center">
                <p class="card-text">Some text inside the sixth card</p>
              </div>
            </div>
          </div>
</div>

<br><br>
@endsection