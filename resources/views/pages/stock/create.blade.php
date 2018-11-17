@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
@section('content')
            <h2><img src="img\stock.jpg">  New Stock </h2>
            <div class="container">
                <div class="well">
                    {!! Form::open(['action'=>'stockController@store','method'=>'POST']) !!}
                            <div class="form-group" style="margin-left:20px">
                                <div class="row">
                                <p style="text-align:left"><strong>{{Form::label('code','Stock Code')}} :</strong></p>
                                <div class="col-sm-10 " style="margin-left:40px">
                                {{Form::text('code',$id,['class'=>'form-control','placeholder'=>'','readonly'])}}
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
                                <p style="text-align:left"><strong>{{Form::label('name','Name')}}  :</strong></p>
                                <div class="col-sm-10 " style="margin-left:76px">
                                {{Form::text('name','',['class'=>'form-control','placeholder'=>''])}}
                              </div>
                            </div>
                              </div>
                              <div class="form-group" style="margin-left:20px">
                                  <div class="row">
                                  <p style="text-align:left"><strong>{{Form::label('availableStock','Available Stock')}}  :</strong></p>
                                  <div class="col-sm-10 " style="margin-left:12px">
                                  {{Form::text('availableStock','',['class'=>'form-control','placeholder'=>''])}}
                                </div>
                              </div>
                                </div>
                                <div class="form-group" style="margin-left:20px">
                                    <div class="row">
                                        <p style="text-align:left"><strong>{{Form::label('purchasedStock','Purchased Stock')}}  :</strong></p>
                                        <div class="col-sm-10 " style="margin-left:5px">
                                        {{Form::text('purchasedStock','',['class'=>'form-control','placeholder'=>''])}}
                                      </div>
                                    </div>
                                      </div>
                                <div class="form-group" style="margin-left:20px">
                                    <div class="row">
                                        <p style="text-align:left"><strong>{{Form::label('soldStock','Stock Sales')}}  :</strong></p>
                                        <div class="col-sm-10 " style="margin-left:43px">      
                                        {{Form::text('soldStock','',['class'=>'form-control','placeholder'=>''])}}
                                      </div>
                                    </div>
                                              </div>
                                <div class="form-group" style="margin-left:20px">
                                    <div class="row">
                                        <p style="text-align:left"><strong>{{Form::label('price','Unit Price')}}  :</strong></p>
                                        <div class="col-sm-10 " style="margin-left:47px">     
                                        {{Form::text('price','',['class'=>'form-control','placeholder'=>''])}}
                                        </div>
                                      </div>
                                    </div>
                            
                                <div class="form-group float-right form-inline">
                                <div class="form-group">
                                  
                                {{Form::submit('Add',['class'=>'btn btn-success'] )}}
                                </div>
                                <div class="form-group">
                                    <a href="stocks" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
                                  </div>
                                </div>
                          {!! Form::close() !!}
                      </div>
            </div>    
@endsection
