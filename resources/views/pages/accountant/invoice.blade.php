@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
<div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                 
            <form action="/searchinvoice" method="POST" role="search" style="margin-left:140px; margin-right:150px;">
              {{ csrf_field() }}
              <div class="input-group">
                <input type="text" class="form-control" name="q" placeholder="Search....">
                <span class="input-group-btn" >
                    <button type="submit" class="btn btn-default">
                      <span><img src="/img/Search1.png" /></span>
                    </button>
                </span>
              </div>
            </form>
            </div>
        </div>
        </div>
@section('content')
            <h2 style="margin-top:-50px;"> New Invoice <img src="img\invoice.png"> </h2>
            <div class="container">
                    {!! Form::open(['action'=>'invoiceController@store','method'=>'POST']) !!}
                    <u style="margin-right:-500px;"><a href="/supplier"><strong>Add New Supplier</strong></a></u>
                            <div class="form-group">
                              <div class="row">
                              <div class="col-md-4 col-form-label text-md-right">
                                <strong>{{Form::label('invoiceNo','Invoice No')}} :</strong>
                                  </div>
                                <div class="col-md-6 ">
                                  {{Form::text('invoiceNo','',['class'=>'form-control float-right','placeholder'=>''])}}
                                </div>
                              </div>
                              </div>
                              <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-4 col-form-label text-md-right">
                                    <label for="id"><strong>Supplier Name :</strong></label>
                                    </div>
                                    <div class="col-md-6">
                                    <select name="id" class="form-control">
                                      @foreach($supplier as $s)
                                    <option value="{{$s->supplierId}}">{{$s->supplierName}}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                  </div>
                                  </div>
                              <div class="form-group">
                                <div class="row">
                                <div class="col-md-4 col-form-label text-md-right">
                                <strong>{{Form::label('date','Date')}}  :</strong>
                                </div>
                                <div class="col-md-6">
                                {{Form::text('date',date('m/d/Y'),['class'=>'form-control','id'=>'datepicker','placeholder'=>''])}}
                                <script>
                                    $('#datepicker').datepicker();
                                    </script>
                              </div>
                              </div>
                              </div>
                              <div class="form-group">
                                  <div class="row">
                                  <div class="col-md-4 col-form-label text-md-right">
                                  <strong>{{Form::label('price','Charges')}}  :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  {{Form::number('price',null,['class'=>'form-control','placeholder'=>''])}}
                                  </div>
                                </div>
                                </div>
                                
                                <div class="form-group float-right form-inline" style="margin-right:180px">
                                <div class="form-group">
                                  
                                {{Form::submit('Add',['class'=>'btn btn-success'] )}}
                                </div>
                                <div class="form-group">
                                    <a href="/invoice" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
                                  </div>
                                </div>
                          {!! Form::close() !!}
            </div>    
@endsection