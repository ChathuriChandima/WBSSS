@extends('layouts.log')
@section('content')
<img src="img/car.jpg" width="1400px" height="300px">
<div class ="container"> 
    
    <br><br><br>
    <div class="card-columns">
            <div class="card bg-dark">
                <h4 class="card-title text-center">Full Service</h4>
                <img class="card-img-top" src="img/full.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                  <a class="btn btn-dark -toggle dropdown-toggle-split float-left" data-toggle="dropdown">LUBRICATION</a>
                  <div class="dropdown-menu bg-info" style="width:60%">
                      <a class="dropdown-item text-light bg-info">We offer <br>- engine oil<br>- transmission<br>-  brake<br>- clutch<br>-  power steering fluid <br>change or top up with high <br>performance lubricants.</a>
                  </div>
              </div>
              <div class="card-body">
                <a class="btn btn-dark -toggle dropdown-toggle-split float-left" data-toggle="dropdown">UNDERCARRIAGE DEGREASING</a>
                  <div class="dropdown-menu bg-info" style="width:70%">
                      <a class="dropdown-item text-light bg-info">We do pressure washes with <br>advanced pressure sensors to <br>remove old grease from vehicle <br>undercarriages.</a>
                  </div>
              </div>
              <div class="card-body">
                  <a class="btn btn-dark -toggle dropdown-toggle-split float-left" data-toggle="dropdown">VACUUMING </a>
                    <div class="dropdown-menu bg-info" style="width:70%">
                        <a class="dropdown-item text-light bg-info"> We ensure that the vehicle <br>interior is free of dust and dirt <br>and grit.</a>
                    </div>
              </div>
              <div class="card-body">
                  <a class="btn btn-dark -toggle dropdown-toggle-split float-left" data-toggle="dropdown">TYRE & DASH DRESSING</a>
                    <div class="dropdown-menu bg-info" style="width:70%">
                        <a class="dropdown-item text-light bg-info">We restore the true colour and <br>natural gloss to the dashboard <br>and leaves tyres looking new.</a>
                    </div>
              </div>
              <div class="card-body">
                  <a class="btn btn-dark -toggle dropdown-toggle-split float-left" data-toggle="dropdown">EXTERIOR WAXING</a>
                    <div class="dropdown-menu bg-info" style="width:75%">
                        <a class="dropdown-item text-light bg-info">We apply a hard wax with a <br>clear coat that produces a high-<br>gloss finish to new or old car paint. <br>The wax also acts as a protective <br>layer that helps maintain the <br>paint and protect it for longer.</a>
                    </div>
              </div>
              <div class="card-body">
                    <a class="btn btn-dark -toggle dropdown-toggle-split float-left" data-toggle="dropdown">MORE...</a>
                      <div class="dropdown-menu bg-info" style="width:75%">
                          <a class="dropdown-item text-light bg-info">Our prices are depend on your <br>vehicle. Following charge is <br>allowed for normal vehicle.</a>
                          <h5><span class="badge badge-danger float-right">Price : Rs.20,000/=</span></h5>
                      </div>
                </div>
            </div>
            <div class="card bg-dark " style="height:485px">
                <h4 class="card-title text-center">Car Wash</h4>
                <img class="card-img-top" src="img/wash.jpg" alt="Card image" style="width:100%" >
              <div class="card-body">
                    <a class="btn btn-dark float-left" style="font-size:large"><p>We'll wash your car while you wait.</p><p>Always keep your car looking great.</p></a>
                    <br>
                    <a class="btn btn-dark -toggle dropdown-toggle-split float-left" data-toggle="dropdown">MORE..</a>
                    <div class="dropdown-menu bg-info" style="width:115%">
                        <a class="dropdown-item text-light bg-info">Our car wash always,<br>- preserves vehicle paintwork<br>- protects from damaging environmental influences</a>
                        <h5><span class="badge badge-danger float-right">Price : Rs.1000/=</span></h5>
                    </div>
              </div>
            </div>
            <div class="card bg-dark" style="height:485px">
                    <h4 class="card-title text-center">Oil & Filter Change</h4>
                    <img class="card-img-top" src="img/filter.jpg" alt="Card image" style="width:100%" >
                  <div class="card-body">
                        <a class="btn btn-dark float-left" style="font-size:large"><p>Routine lube and oil changes will keep </p><p style="text-align:left">your engine running stronger and </p><p style="text-align:left">running longer.</p></a>
                        <br>
                        <a class="btn btn-dark -toggle dropdown-toggle-split float-left" data-toggle="dropdown">MORE..</a>
                        <div class="dropdown-menu bg-info" style="width:115%">
                            <a class="dropdown-item text-light bg-info">- Per one filter : <h5><span class="badge badge-danger float-right">Price : Rs.2500-3000/=</span></h5></a>
                            <a class="dropdown-item text-light bg-info">- According to your oil, oil prices are changed.</a>
                        </div>
                  </div>
                </div>
                <div class="card bg-dark" style="height:485px">
                        <h4 class="card-title text-center">Undercarriage Wash</h4>
                        <img class="card-img-top" src="img/un.jpg" alt="Card image" style="width:100%" >
                      <div class="card-body">
                            <a class="btn btn-dark float-left" style="font-size:large">Our wash process is an effective way to </p><p style="text-align:left">maintain your vehicle´s value.</p></a>
                            <br>
                            <a class="btn btn-dark -toggle dropdown-toggle-split float-left" data-toggle="dropdown">MORE..</a>
                            <div class="dropdown-menu bg-info" style="width:120%">
                                <a class="dropdown-item text-light bg-info">- Complete Undercarriage Pressure Wash Exterior Wash : </a>
                                <h5><span class="badge badge-danger float-right">Price : Rs.1000/=</span></h5>
                                <a class="dropdown-item text-light bg-info">- Special Package : </a>
                                <h5><span class="badge badge-danger float-right">Price : Rs.3000/=</span></h5>
                            </div>
                      </div>
                    </div>
                    <div class="card bg-dark" style="height:485px">
                            <h4 class="card-title text-center">Engine Cleaning</h4>
                            <img class="card-img-top" src="img/engine.jpg" alt="Card image" style="width:100%" >
                          <div class="card-body">
                                <a class="btn btn-dark float-left" style="font-size:large"><p>- Increase the value of your car.</p><p style="text-align:left">- Extend Working Life</p><p style="text-align:left">- Improve Vehicle Safety</p></a>
                                <br>
                                <a class="btn btn-dark -toggle dropdown-toggle-split float-left" data-toggle="dropdown">MORE..</a>
                                <div class="dropdown-menu bg-info" style="width:70%">
                                    <a class="dropdown-item text-light bg-info">Our prices are depend on your <br>vehicle. Following charge is <br>allowed for normal vehicle.</a>
                                    <h5><span class="badge badge-danger float-right">Price : Rs.2000/=</span></h5>
                                </div>
                          </div>
                        </div>
                    <div class="card bg-dark" style="height:485px">
                            <h4 class="card-title text-center" style="color:deeppink">IMPORTANT !</h4>
                          <div class="card-body">
                                <a class="btn btn-dark float-left" style="font-size:xx-large"><p>All the prices of </p><p>services are depend </p>on vehicle type.</a>
                                <br>
                          </div>
                          <img class="card-img-bottom" src="img/service.jpg" alt="Card image" style="height:48%" >
                        </div>
          </div>
</div>

<br><br>
@endsection