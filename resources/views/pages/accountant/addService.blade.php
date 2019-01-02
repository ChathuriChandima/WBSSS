@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
@section('content')
            <h2 style="margin-top:-30px;"><img src="img\services.png">  New Service </h2>
            <br>
            <div class="container">
                    {!! Form::open(['action'=>'ServicesController@store','method'=>'POST']) !!}
                            <div class="form-group">
                              <div class="row">
                              <div class="col-md-4 col-form-label text-md-right">
                                <strong>{{Form::label('sid','Service Code')}} :</strong>
                                  </div>
                                <div class="col-md-6 ">
                                  {{Form::text('sid',$id,['class'=>'form-control float-right','placeholder'=>'','readonly'])}}
                                </div>
                              </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                <div class="col-md-4 col-form-label text-md-right">
                                <strong>{{Form::label('name','Service Name')}}  :</strong>
                                </div>
                                <div class="col-md-6">
                                {{Form::text('name','',['class'=>'form-control','placeholder'=>''])}}
                                </div>
                              </div>
                              </div>
                              <div class="form-group">
                                  <div class="row">
                                  <div class="col-md-4 col-form-label text-md-right">
                                  <strong>{{Form::label('price','Price')}}  :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  {{Form::number('price','',['class'=>'form-control','placeholder'=>''])}}
                                  </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-4 col-form-label text-md-right">
                                    <strong>{{Form::label('discount','Discount')}}  :</strong>
                                    </div>
                                    <div class="col-md-6">
                                    {{Form::number('discount','',['class'=>'form-control','placeholder'=>''])}}
                                    </div>
                                  </div>
                                  </div>
                                
                                <div class="form-group float-right form-inline" style="margin-right:180px">
                                <div class="form-group">
                                  
                                {{Form::submit('Add',['class'=>'btn btn-success'] )}}
                                </div>
                                <div class="form-group">
                                    <a href="/services" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
                                  </div>
                                </div>
                          {!! Form::close() !!}
            </div>    
@endsection