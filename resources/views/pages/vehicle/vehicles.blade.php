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
            <a href="add" class="btn float-right"  title="New Vehicle"> <img src="img\icons8_Add_New_50px_1.png"  /></a> 
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
                                {{Form::text('cId',$v->cId,['class'=>'form-control','placeholder'=>'','readonly'])}}
                                <br>
                                <a href="#" title="Select" data-toggle="popover" data-content="Some content">Change Owner</a><br>
                                <script>
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
            <a class="btn" href="" title="Delete"><img src="img\icons8_Delete_25px_6.png" /></a>
            
 
            <!--{!! Form::open(['method' => 'DELETE','style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}-->
            {!! Form::close() !!}
        </td>
        @endforeach
    </tr>
    
   
    </table>
</div>
   
@endsection

