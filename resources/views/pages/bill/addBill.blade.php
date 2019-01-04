@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
@section('content')
            <h2 style="margin-top:-30px;"><img src="img\bill.png">  New Bill </h2>
            <br>
            <div class="container">
                    {!! Form::open(['action'=>'billController@store','method'=>'POST']) !!}
                            <div class="form-group">
                              <div class="row">
                              <div class="col-md-4 col-form-label text-md-right">
                                <strong>{{Form::label('billNo','Bill No')}} :</strong>
                                  </div>
                                <div class="col-md-6 ">
                                  {{Form::text('billNo',$id,['class'=>'form-control float-right','placeholder'=>'','readonly'])}}
                                </div>
                              </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                <div class="col-md-4 col-form-label text-md-right">
                                <strong>{{Form::label('date','Billed Date')}}  :</strong>
                                </div>
                                <div class="col-md-6">
                                {{Form::text('date','',['class'=>'form-control','placeholder'=>''])}}
                                </div>
                              </div>
                              </div>
                              <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-4 col-form-label text-md-right">
                                    <strong>{{Form::label('customerName','Customer Name')}}  :</strong>
                                    </div>
                                    <div class="col-md-6">
                                    {{Form::text('customerName','',['class'=>'form-control','placeholder'=>''])}}
                                    </div>
                                  </div>
                                  </div>
                                  <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-4 col-form-label text-md-right">
                                        <strong>{{Form::label('vehicleNo','Vehicle No')}}  :</strong>
                                        </div>
                                        <div class="col-md-6">
                                        {{Form::text('vehicleNo','',['class'=>'form-control','placeholder'=>''])}}
                                        </div>
                                      </div>
                                      </div>
                                      <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-4 col-form-label text-md-right">
                                            <strong>{{Form::label('serviceDescription','Service Description')}}  :</strong>
                                            </div>
                                            <div class="col-md-6">
                                            {{Form::text('serviceDescription','',['class'=>'form-control','placeholder'=>''])}}
                                            </div>
                                          </div>
                                          </div>
                                          <div class="form-group">
                                                <div class="row">
                                                <div class="col-md-4 col-form-label text-md-right">
                                                <strong>{{Form::label('addedParts','Spare Parts Added')}}  :</strong>
                                                </div>
                                                <div class="col-md-6">
                                                {{Form::text('addedParts','',['class'=>'form-control','placeholder'=>''])}}
                                                </div>
                                              </div>
                                              </div>
                              <div class="form-group">
                                  <div class="row">
                                  <div class="col-md-4 col-form-label text-md-right">
                                  <strong>{{Form::label('stockQty','Part Quantity')}}  :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  {{Form::number('stockQty','',['class'=>'form-control','placeholder'=>''])}}
                                  </div>
                                </div>
                                </div>
                                <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-4 col-form-label text-md-right">
                                        <strong>{{Form::label('serviceCharge','Service Charges')}}  :</strong>
                                        </div>
                                        <div class="col-md-6">
                                        {{Form::number('serviceCharge','',['class'=>'form-control','placeholder'=>''])}}
                                        </div>
                                      </div>
                                      </div>
                                      <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-4 col-form-label text-md-right">
                                            <strong>{{Form::label('stockCharge','SpareParts Charge')}}  :</strong>
                                            </div>
                                            <div class="col-md-6">
                                            {{Form::number('stockCharge','',['class'=>'form-control','placeholder'=>''])}}
                                            </div>
                                          </div>
                                          </div>
                               
                                
                                <div class="form-group float-right form-inline" style="margin-right:180px">
                                <div class="form-group">
                                  
                                {{Form::submit('Add',['class'=>'btn btn-success'] )}}
                                </div>
                                <div class="form-group">
                                    <a href="/bills" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
                                  </div>
                                </div>
                          {!! Form::close() !!}
            </div>    
@endsection