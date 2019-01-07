@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
@section('content')
            <h2><img src="img\addStaff.jpg" style="width:150px;height:150px;">  make salary payments</h2>
            <div class="container">
              <div class="well">
                  {!! Form::open(['action'=>'salaryController@pay','method'=>'POST']) !!}
                        
                            <div class="form-group" style="margin-left:20px">
                              <div class="row">
                              <p style="text-align:left"><strong>{{Form::label('year','Year')}}  :</strong></p>
                              <div class="col-sm-10 " style="margin-left:80px">
                              {{Form::text('year','',['class'=>'form-control','placeholder'=>''])}}
                              </div>
                            </div>
                            </div>
                            <div class="form-group" style="margin-left:20px">
                              <div class="row">
                              <p style="text-align:left"><strong>{{Form::label('month','Month')}}  :</strong></p>
                              <div class="col-sm-10 "style="margin-left:65px">
                              {{Form::text('month','',['class'=>'form-control','placeholder'=>''])}}
                              </div>
                            </div>
                            </div>
                            
                              <div class="form-group" style="margin-left:20px">
                                <div class="row">
                                <p style="text-align:left"><strong>{{Form::label('role','Role')}}  :</strong></p>
                                <div class="col-sm-3 " style="margin-left:20px">
                                {{Form::select('role',$staff,['class'=>'form-control','placeholder'=>''])}}
                                </div>
                              </div>
                              </div>
                             
                              
                              {{Form::submit('Add',['class'=>'btn btn-success'] )}}
                              
                                  <a href="salary" class="btn btn-danger float-right "  id="cl" ><strong>Cancel</strong></a>
                                </div>
                              </div>
                        {!! Form::close() !!}
                    </div>
          </div>    
@endsection
