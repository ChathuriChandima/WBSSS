@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
@section('content')
            <h2 style="margin-top:-40px;"><img src="img\customer.png"> New Customer </h2>
            <div class="container">
                    {!! Form::open(['action'=>'customerController@create','method'=>'GET']) !!}
                    @csrf
                            <div class="form-group">
                              <div class="row">
                              <div class="col-md-4 col-form-label text-md-right">
                                <strong>{{Form::label('name','Name')}} :</strong>
                                  </div>
                                <div class="col-md-6 ">
                                  {{Form::text('name','',['class'=>'form-control float-right','placeholder'=>''])}}
                                  @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                </div>
                              </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                <div class="col-md-4 col-form-label text-md-right">
                                <strong>{{Form::label('email','Email-address')}}  :</strong>
                                </div>
                                <div class="col-md-6">
                                {{Form::email('email','',['class'=>'form-control','placeholder'=>''])}}
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                              </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 col-form-label text-md-right">
                              <strong>{{Form::label('address','Address')}} :</strong>
                                    </div>
                                    <div class="col-md-6">
                              {{Form::text('address','',['class'=>'form-control','placeholder'=>''])}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 col-form-label text-md-right">
                              <strong>{{Form::label('contactNo','Contact Number')}} :</strong>
                                    </div>
                                    <div class="col-md-6">
                              {{Form::input('number','contactNo',null,['class'=>'form-control','placeholder'=>''])}}
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