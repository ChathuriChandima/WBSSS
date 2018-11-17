@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
@section('content')
            <h2><img src="img\icons8_Carpool_75px.png">  New Vehicle </h2>
            <div class="container">
                <div class="well">
                    {!! Form::open(['action'=>'vehicleController@store','method'=>'POST']) !!}
                            <div class="form-group" style="margin-left:20px">
                              <div class="row">
                                <p style="text-align:left"><strong>{{Form::label('vehicleNo','Vehicle No')}} :</strong></p>
                                <div class="col-sm-10 " style="margin-left:40px">
                                  {{Form::text('vehicleNo','',['class'=>'form-control float-right','placeholder'=>''])}}
                                </div>
                              </div>
                              </div>
                              <div class="form-group" style="margin-left:20px">
                                <div class="row">
                                <p style="text-align:left"><strong>{{Form::label('type','Type')}}  :</strong></p>
                                <div class="col-sm-10 " style="margin-left:80px">
                                {{Form::text('type','',['class'=>'form-control','placeholder'=>''])}}
                                </div>
                              </div>
                              </div>
                              <div class="form-group" style="margin-left:20px">
                                <div class="row">
                                <p style="text-align:left"><strong>{{Form::label('lastServiceDay','Last Service Day')}}  :</strong></p>
                                <div class="col-sm-10 ">
                                {{Form::text('lastServiceDay','',['class'=>'form-control','placeholder'=>''])}}
                                </div>
                              </div>
                              </div>
                              <div class="form-group" style="margin-left:20px">
                                  <div class="row">
                                  <p style="text-align:left"><strong>{{Form::label('brand','Brand')}}  :</strong></p>
                                  <div class="col-sm-10 " style="margin-left:75px">
                                  {{Form::text('brand','',['class'=>'form-control','placeholder'=>''])}}
                                  </div>
                                </div>
                                </div>
                                <div class="form-group" style="margin-left:20px">
                                    <div class="row">
                                    <p style="text-align:left"><label for="cId"><strong>Owner :</strong></label></p>
                                    <div class="col-sm-10 " style="margin-left:71px">
                                    <select name="cId" class="form-control">
                                      @foreach($customer as $owner)
                                    <option value="{{$owner->Id}}">{{$owner->name}}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                  </div>
                                  </div>
                                <div class="form-group" style="margin-left:20px">
                                  <div class="row">
                                  <p style="text-align:left"><label for="status"><strong>Status :</strong></label></p>
                                  <div class="col-sm-10 " style="margin-left:71px">
                                  <select name="status" class="form-control">
                                  <option value="0">Not at service station</option>
                                  <option value="1">Servicing</option>
                                  <option value="2">Finished Service</option>
                                  </select>
                                  </div>
                                </div>
                                </div>
                                <div class="form-group float-right form-inline" style="margin-right:50px">
                                <div class="form-group">
                                  
                                {{Form::submit('Add',['class'=>'btn btn-success'] )}}
                                </div>
                                <div class="form-group">
                                    <a href="vehicles" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
                                  </div>
                                </div>
                          {!! Form::close() !!}
                      </div>
            </div>    
@endsection