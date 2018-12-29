@extends('layouts.log')
@section('content')
<link rel="stylesheet" href="{{asset('my/s.css')}}">
<div class="container mt-3">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href='#p'>Personal Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#v">Vehicle Details</a>
      </li>
    </ul>
  
    <!-- Tab panes -->
    <div class="tab-content">
      <div id="p" class="container tab-pane active"><br>
      <img src="img\{{$user->pic}}" style="width:100px; height:100px; float:left; border-radius:50%; border-color:blue; border-width:1px; margin-right:25px;">
            <h2 style="text-align:left">Personal Profile</h2>
            <form enctype="multipart/form-data" action="/picture" method="POST">
              <p  style="text-align:left"><label>Update Profile Image</label><br />
              <input type="file" name="pic">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn btn-dark" style="margin-left: -50px"></p>
            </form>
            <div class="container">
            <form>

                <div class="row">
                    <div class="col-md-4 col-form-label text-md-right">
                <label for="name"><strong>Name :</strong></label>
                    </div>
                <div class="col-md-6 ">
                <input type="text" class="form-control" id="name" placeholder={{$customer->name}} disabled><br>
              </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-form-label text-md-right">
                <label for="add"><strong>Address :</strong></label>
                    </div>
                    <div class="col-md-6 ">
                <input type="text" class="form-control" id="add" placeholder={{$customer->address}}  disabled><br>
              </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-form-label text-md-right">
                <label for="email"><strong>Email Address :</strong></label>
                    </div>
                    <div class="col-md-6 ">
                <input type="text" class="form-control" id="email" placeholder={{$customer->email}} disabled><br>
              </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-form-label text-md-right">
                <label for="contact"><strong>Contact Number :</strong></label>
                    </div>
                <div class="col-md-6">
                <input type="number" class="form-control" id="contact" placeholder={{"0".$customer->contactNo}} disabled><br>
              </div>
                </div>
                <div class="form-group">
                    <a href="personal" type="submit" class="btn btn-primary float-right " style="margin-right:165px" title="Edit"><strong>Edit</strong></a>
                  </div>
            </form>
            </div>

        </div>
        <div id="v" class="container tab-pane fade"><br>

            <div class="well">
              <h2><img src="img\icons8_Maintenance_50px_1.png" >  Vehicle Profile </h2>
              <div class="container" style="text-align:left">
                <h3 style="font-size:large"><p style="color:blueviolet"><b> Your Vehicles</b></p></h3><br>
                <div class="row">
                @foreach ($vehicle as $v)
                  @if($v->cId==$customer->Id)
                  <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                      <div class="wrapper">
                          <div class="card bg-light">
                              <div class="card-body">
                                <div class="row">
                                <div class="col-md-4 text-md-right">
                                <p>Vehicle No : </p>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$v->vehicleNo}}</p>
                                </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-4 text-md-right">
                                <p>Last Service Day : </p>
                              </div>
                              <div class="col-md-6">
                                  <p>{{$v->lastServiceDay}}</p>
                              </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 text-md-right">
                                  <p>Status : </p>
                                </div>
                                <div class="col-md-6">
                                    @if($v->status==0)
                                    <p style="color:red">Not at service station</p>
                                    @elseif($v->status==1)
                                    <p style="color:green">Servicing......</p>
                                    @elseif($v->status==2)
                                    <p style="color:blue">Finished Service!</p>
                                    @endif
                                </div>
                                  </div>
                              </div>
                          </div>
                  </div> 
              </div>
              @endif
              @endforeach
            </div>
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection 