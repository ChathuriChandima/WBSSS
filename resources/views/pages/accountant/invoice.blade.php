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

                                <!-- Adding jquery and javascript function to duplicate divs -->

                                <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.0.min.js"></script>
                                <script type="text/javascript">
                                    var count = 0;
                                    $(function() {
                                      $("#add").click(function() {
                                          count++;
                                          document.getElementById("count").value = (count + 1);
                                          div = document.createElement('div');
                                          var html =  `
                                          <div id = "inner">
                                            <div class="col-md-4 col-form-label text-md-right">
                                              <p style="text-align:center"><label for="status"><strong>Item ${(count + 1)} :</strong></label></p>
                                            </div>
                                            <div class="row">
                                              <div class="col-md-4 col-form-label text-md-right">
                                                <label for="stock"><strong>Name :</strong></label>
                                              </div>
                                              <div class="col-md-6">
                                                <!-- <input type="text" name = "stock[${count}][name]" class = "form-control"> -->
                                                <select name="stock[0][name]" class="form-control">
                                                  @foreach($stockNames as $stock)
                                                    <option value= "{{$stock->name}}">{{$stock->name}}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-md-4 col-form-label text-md-right">
                                                <label for="quantity"><strong>Quantity :</strong></label>
                                              </div>
                                              <div class="col-md-6">
                                                <input type="number" name = "stock[${count}][qun]" class = "form-control" value ="0">
                                              </div>
                                            </div>
                                          </div>
                                          `;
                                          $(div).addClass("inner")
                                          .html(html);
                                          $("#container").append(div);
                                        });
                                    });
                                </script>


                                <!-- buttons to add and remove stock items  -->
                                <a href="#" class="btn btn-danger float-center " style="margin:5px"  id="add" ><strong>Add Stock Item</strong></a>
                                <!-- Stocks data comes here -->
                                <div class="col-md-4 col-form-label text-md-right">
                                  <label for="status"><strong>Stocks :</strong></label>
                                </div>

                                <div id = "container">
                                  <div id = "inner">
                                    <div class="col-md-4 col-form-label text-md-right">
                                      <p style="text-align:center"><label for="status"><strong>Item 1 :</strong></label></p>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-4 col-form-label text-md-right">
                                        <label for="stock"><strong>Name :</strong></label>
                                      </div>
                                      <div class="col-md-6">
                                        <!-- <input type="text" name = "stock[0][name]" class = "form-control"> -->
                                        <select name="stock[0][name]" class="form-control">
                                          @foreach($stockNames as $stock)
                                            <option value= "{{$stock->name}}">{{$stock->name}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-4 col-form-label text-md-right">
                                        <label for="quantity"><strong>Quantity :</strong></label>
                                      </div>
                                      <div class="col-md-6">
                                        <input type="number" name = "stock[0][qun]" class = "form-control" value ="0">
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <input type="hidden" id="count" name="count" value="1">
                                <div class="form-group float-right form-inline" style="margin-right:180px">
                                <div class="form-group">

                                {{Form::submit('Save',['class'=>'btn btn-success'] )}}
                                </div>
                                <div class="form-group">
                                    <a href="/invoice" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
                                  </div>
                                </div>
                          {!! Form::close() !!}
            </div>
@endsection
