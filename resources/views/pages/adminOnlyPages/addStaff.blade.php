@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
@section('content')
            <h2><img src="img\addStaff.jpg" style="width:150px;height:150px;">  New Staff member</h2>
            <div class="container">
              <div class="well">
                  {!! Form::open(['action'=>'staffController@store','method'=>'POST']) !!}
                        
                            <div class="form-group" style="margin-left:20px">
                              <div class="row">
                              <p style="text-align:left"><strong>{{Form::label('name','Name')}}  :</strong></p>
                              <div class="col-sm-10 " style="margin-left:80px">
                              {{Form::text('name','',['class'=>'form-control','placeholder'=>''])}}
                              </div>
                            </div>
                            </div>
                            <div class="form-group" style="margin-left:20px">
                              <div class="row">
                              <p style="text-align:left"><strong>{{Form::label('address','Address')}}  :</strong></p>
                              <div class="col-sm-10 "style="margin-left:65px">
                              {{Form::text('address','',['class'=>'form-control','placeholder'=>''])}}
                              </div>
                            </div>
                            </div>
                            <div class="form-group" style="margin-left:20px">
                                <div class="row">
                                <p style="text-align:left"><strong>{{Form::label('contactNo','Contact No')}}  :</strong></p>
                                <div class="col-sm-10 " style="margin-left:45px">
                                {{Form::text('contactNo','',['class'=>'form-control','placeholder'=>''])}}
                                </div>
                              </div>
                              </div>
                              <div class="form-group" style="margin-left:20px">
                                <div class="row">
                                <p style="text-align:left"><strong>{{Form::label('email','Email')}}  :</strong></p>
                                <div class="col-sm-10 " style="margin-left:80px">
                                {{Form::text('email','',['class'=>'form-control','placeholder'=>''])}}
                                </div>
                              </div>
                              </div>
                              <div class="form-group" style="margin-left:20px">
                                <div class="row">
                                <p style="text-align:left"><strong>{{Form::label('role','Role')}}  :</strong></p>
                                <div class="col-sm-3 " style="margin-left:20px">
                                {{Form::select('role',array('mechanic'=>'mechanic','accountant'=>'accountant','admin'=>'admin'),['class'=>'form-control','placeholder'=>''])}}
                                </div>
                              </div>
                              </div>
                              <!--<div class="form-group" style="margin-left:20px">
                                <div class="row">
                                <p style="text-align:left"><strong>{{Form::label('password','Password')}}  :</strong></p>
                                <div class="col-sm-10 " style="margin-left:50px">
                                {{Form::text('password','',['class'=>'form-control','placeholder'=>''])}}
                                </div>
                              </div>
                              </div>-->
                              
                              {{Form::submit('Add',['class'=>'btn btn-success'] )}}
                              
                                  <a href="staff" class="btn btn-danger float-right "  id="cl" ><strong>Cancel</strong></a>
                                </div>
                              </div>
                        {!! Form::close() !!}
                    </div>
          </div>    
@endsection
