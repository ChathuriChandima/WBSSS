@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
@section('content')
            <h2 style="margin-top:-50px;"><img src="img\icons8_Carpool_75px.png">  New Vehicle </h2>
            <div class="container">
                    {!! Form::open(['action'=>'vehicleController@store','method'=>'POST']) !!}
                    <u style="margin-right:-500px;"><a href="/user"><strong>Add New Customer</strong></a></u>
                            <div class="form-group">
                              <div class="row">
                              <div class="col-md-4 col-form-label text-md-right">
                                <strong>{{Form::label('vehicleNo','Vehicle No')}} :</strong>
                                  </div>
                                <div class="col-md-6 ">
                                  {{Form::text('vehicleNo','',['class'=>'form-control float-right','placeholder'=>''])}}
                                </div>
                              </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                <div class="col-md-4 col-form-label text-md-right">
                                <strong>{{Form::label('type','Type')}}  :</strong>
                                </div>
                                <div class="col-md-6">
                                {{Form::text('type','',['class'=>'form-control','placeholder'=>''])}}
                                </div>
                              </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                <div class="col-md-4 col-form-label text-md-right">
                                <strong>{{Form::label('lastServiceDay','Last Service Day')}}  :</strong>
                                </div>
                                <div class="col-md-6">
                                {{Form::text('lastServiceDay',date('m/d/Y'),['class'=>'form-control','id'=>'datepicker','placeholder'=>''])}}
                                <script>
                                    $('#datepicker').datepicker();
                                    </script>
                              </div>
                              </div>
                              </div>
                              <div class="form-group">
                                  <div class="row">
                                  <div class="col-md-4 col-form-label text-md-right">
                                  <strong>{{Form::label('brand','Brand')}}  :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  {{Form::text('brand','',['class'=>'form-control','placeholder'=>''])}}
                                  </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-4 col-form-label text-md-right">
                                    <label for="cId"><strong>Owner :</strong></label>
                                    </div>
                                    <div class="col-md-6">
                                    <select name="cId" class="form-control">
                                      @foreach($customer as $owner)
                                    <option value="{{$owner->Id}}">{{$owner->name}}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                  </div>
                                  </div>
                                <div class="form-group">
                                  <div class="row">
                                  <div class="col-md-4 col-form-label text-md-right">
                                  <label for="status"><strong>Status :</strong></label>
                                  </div>
                                  <div class="col-md-6">
                                  <select name="status" class="form-control">
                                  <option value="0">Not at service station</option>
                                  <option value="1">Servicing</option>
                                  <option value="2">Finished Service</option>
                                  </select>
                                  </div>
                                </div>
                                </div>
                                <div class="form-group float-right form-inline" style="margin-right:180px">
                                <div class="form-group">
                                  
                                {{Form::submit('Add',['class'=>'btn btn-success'] )}}
                                </div>
                                <div class="form-group">
                                    <a href="vehicles" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
                                  </div>
                                </div>
                          {!! Form::close() !!}
            </div>    
@endsection