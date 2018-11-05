@extends('layouts.log')

<link rel="stylesheet" href="{{asset('my/m.css')}}">

<div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/p2.jpg" width="1600" height="300"style = "padding-left:250px">
      <div class="carousel-caption">
              <h1>RAJAAN MOTORS</h1>
              <h2>Vehicle Details</h2>

      </div>
</div>
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
            <a href="add_vehicle" class="btn float-right"  title="New Vehicle"> <img src="img\icons8_Add_New_50px_1.png"  /></a> 
    </div>
</div>
@section('content')

<div class="container">
<table class="table table-bordered">
        <tr>
            <th style="text-align:center">Vehicle No</th>
            <th style="text-align:center">Type</th>
            <th style="text-align:center">Description</th>
            <th style="text-align:center">Brand</th>
            <th width="200px" style="text-align:center">Action</th>
        </tr>
    @foreach ($vehicle as $v)
    <tr>
        <td>{{$v->vehicleNo}}</td>
        <td>{{$v->type}}</td>
        <td>{{$v->lastServiceDay}}</td>
        <td>{{$v->brand}}</td>
        <td>
            <button type="button" class="btn" title="Edit" data-toggle="modal" data-target="#myModal" ><img src="img\icons8_Edit_25px.png" /></button>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Vehicle Details</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['action'=>'vehicleController@store','method'=>'POST']) !!}
                        <div class="form-group">
                            <p style="text-align:left"><strong>{{Form::label('vehicleNo','Vehicle No')}} :</strong></p>
                            {{Form::text('vehicleNo',$v->vehicleNo,['class'=>'form-control','placeholder'=>'','readonly'])}}
                          </div>
                          <div class="form-group">
                            <p style="text-align:left"><strong>{{Form::label('type','Type')}}  :</strong></p>
                            {{Form::text('type',$v->type,['class'=>'form-control','placeholder'=>'','readonly'])}}
                          </div>
                          <div class="form-group" >
                            <p style="text-align:left"><strong>{{Form::label('lastServiceDay','Last Service Day')}}  :</strong></p>
                            {{Form::text('lastServiceDay',$v->lastServiceDay,['class'=>'form-control','placeholder'=>''])}}
                          </div>
                          <div class="form-group" >
                              <p style="text-align:left"><strong>{{Form::label('brand','Brand')}}  :</strong></p>
                              {{Form::text('brand',$v->brand,['class'=>'form-control','placeholder'=>'','readonly'])}}
                            </div>
                            <div class="form-group" >
                                <strong>{{Form::label('cId','Owner')}}  :</strong>
                                {{Form::text('cId',$v->cId,['class'=>'form-control','id'=>'cId','placeholder'=>''])}}
                                <br>
                                <select name="c" class="form-control" disabled>
                                        @foreach($customer as $owner)
                                      <option value="{{$owner->Id}}">{{$owner->name}}</option>
                                      @endforeach
                                      </select>
                                <button onclick="myFunction()">Copy Text</button>
                                <script>

                                    
                                        function myFunction() {
                                            document.getElementById("field2").value = document.getElementById("field1").value;
                                        }

                                        $(document).ready(function(){
                                            $('[data-toggle="popover"]').popover();
                                        });
                                </script>

                              </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
              <!-- delete vehicle-->
              <a href="{{route('delete', $v->vehicleNo)}}" class="btn" role="button" style="background-color:silver"><img src="img\icons8_Trash_25px_1.png" /></a> 
        </td>
        @endforeach
    </tr>
    </table>
</div>

@endsection
