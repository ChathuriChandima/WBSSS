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
                            <div class="form-group">
                                <p style="text-align:left"><strong>{{Form::label('vehicleNo','Vehicle No')}} :</strong></p>
                                {{Form::text('vehicleNo','',['class'=>'form-control','placeholder'=>''])}}
                              </div>
                                <p style="text-align:left"><strong>{{Form::label('type','Type')}}  :</strong></p>
                                {{Form::text('type','',['class'=>'form-control','placeholder'=>''])}}
                              </div>
                              <div class="form-group" >
                                <p style="text-align:left"><strong>{{Form::label('lastServiceDay','Last Service Day')}}  :</strong></p>
                                {{Form::text('lastServiceDay','',['class'=>'form-control','placeholder'=>''])}}
                              </div>
                              <div class="form-group" >
                                  <p style="text-align:left"><strong>{{Form::label('brand','Brand')}}  :</strong></p>
                                  {{Form::text('brand','',['class'=>'form-control','placeholder'=>''])}}
                                </div>
                                <div class="form-group" >
                                    <p style="text-align:left"><label for="cId"><strong>Owner :</strong></label></p>
                                    <select name="cId" class="form-control">
                                      @foreach($customer as $owner)
                                    <option value="{{$owner->Id}}">{{$owner->name}}</option>
                                    @endforeach
                                    </select>
                                  </div>
                                <br>
                                <div class="form-group float-right form-inline">
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