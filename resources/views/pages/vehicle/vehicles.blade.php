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
<div class="container mt-3">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" style="margin-top:-60px">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href='#p'>All vehicles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#v">Service in Progress</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#f">Completed</a>
      </li>
    </ul>
  
    <!-- Tab panes -->
    <div class="tab-content">
      <div id="p" class="container tab-pane active"><br>
<div class="container">
<table class="table table-bordered">
        <tr>
            <th style="text-align:center">Vehicle No</th>
            <th style="text-align:center">Type</th>
            <th style="text-align:center">Last Service Date</th>
            <th style="text-align:center">Brand</th>
            <th style="text-align:center">Owner</th>
            <th width="200px" style="text-align:center">Action</th>
        </tr>
    @foreach ($vehicle as $v)
    <tr>
        <td>{{$v->vehicleNo}}</td>
        <td>{{$v->type}}</td>
        <td>{{$v->lastServiceDay}}</td>
        <td>{{$v->brand}}</td>
        @foreach($customer as $owner)
        @if($owner->Id==$v->cId)
        <td>{{$owner->name}}</td>
        @endif
        @endforeach
        <td>
        <button type="button" class="btn" title="Edit" data-toggle="modal" data-target="#myModal" data-mytitle="{{$v->vehicleNo}}" data-myday="{{$v->lastServiceDay}}" data-mytype="{{$v->type}}" data-mybrand="{{$v->brand}}" data-myname="{{$owner->name}}"><img src="img\icons8_Edit_25px.png" /></button>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Vehicle Details</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['action'=>['vehicleController@update',$v->vehicleNo],'method'=>'POST']) !!}
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
                                <select name="cId" class="form-control" >
                                @foreach($customer as $owner)
                                @if($owner->Id==$v->cId)
                                <option value="{{$owner->Id}}">{{$owner->name}}</option>
                                @endif
                                @endforeach
                                        @foreach($customer as $owner)
                                        @if($owner->Id!=$v->cId)
                                      <option value="{{$owner->Id}}">{{$owner->name}}</option>
                                      @endif
                                      @endforeach
                                      </select>

                              </div>
                              <div class="form-group float-right form-inline">
                                    <div class="form-group">
                                      {{Form::hidden('_method','PUT')}}
                                    {{Form::button('<img src="img\icons8_Edit_25px.png" />',['type'=>'submit','class'=>'btn'] )}}
                                    </div>
                                    </div>
                              {!! Form::close()!!}
                    </div>
                  </div>

                </div>
              </div>
              <!-- delete vehicle-->
              <a href="{{route('delete', $v->vehicleNo)}}" class="btn" role="button" style="background-color:bisque"><img src="img\icons8_Trash_25px_1.png" /></a> 
        </td>
        @endforeach
    </tr>
    </table>
</div>
      </div>
      <div id="v" class="container tab-pane"><br>
        <table class="table table-bordered">
            <tr>
                <th style="text-align:center">Vehicle No</th>
                <th style="text-align:center">Type</th>
                <th style="text-align:center">Last Service Date</th>
                <th style="text-align:center">Brand</th>
                <th style="text-align:center">Owner</th>
                <th width="200px" style="text-align:center">Action</th>
            </tr>
        @foreach ($vehicle as $v)
        @if($v->status=="1")
        <tr>
            <td>{{$v->vehicleNo}}</td>
            <td>{{$v->type}}</td>
            <td>{{$v->lastServiceDay}}</td>
            <td>{{$v->brand}}</td>
            @foreach($customer as $owner)
            @if($owner->Id==$v->cId)
            <td>{{$owner->name}}</td>
            @endif
            @endforeach
            <td><button type="button" class="btn" title="Edit" data-toggle="modal" data-target="#myModal1" data-mytitle="{{$v->vehicleNo}}" ><img src="img\icons8_Pencil_25px.png" /></button>

                <div class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog" style="vertical-align:middle">
    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Select Option</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                                {!! Form::open(['action'=>['vehicleController@edit',$v->vehicleNo],'method'=>'POST']) !!}   
                                <div class="form-group" style="margin-left:20px">
                                        <div class="row">
                                        <p style="text-align:left"><label for="status"><strong>Status :</strong></label></p>
                                        <div class="col-sm-10 " style="margin-left:71px">
                                        <select name="status" class="form-control">
                                        <option value="0">Not at service station</option>
                                        <option value="2">Finished Service</option>
                                        </select>
                                        </div>
                                      </div>
                                      </div>
                                      <div class="form-group float-right form-inline">
                                    <div class="form-group">
                                      {{Form::hidden('_method','GET')}}
                                    {{Form::button('<img src="img\icons8_Available_Updates_25px_1.png" />',['type'=>'submit','class'=>'btn'] )}}
                                    </div>
                                    </div>
                              {!! Form::close()!!}

                      </div>
    
                    </div>
                  </div></td>
        </tr>
        @endif
            @endforeach
        </table>
    </div>
    <div id="f" class="container tab-pane"><br>
        <table class="table table-bordered">
            <tr>
                <th style="text-align:center">Vehicle No</th>
                <th style="text-align:center">Type</th>
                <th style="text-align:center">Last Service Date</th>
                <th style="text-align:center">Brand</th>
                <th style="text-align:center">Owner</th>
                <th width="200px" style="text-align:center">Action</th>
            </tr>
        @foreach ($vehicle as $v)
        @if($v->status=="2")
        <tr>
            <td>{{$v->vehicleNo}}</td>
            <td>{{$v->type}}</td>
            <td>{{$v->lastServiceDay}}</td>
            <td>{{$v->brand}}</td>
            @foreach($customer as $owner)
            @if($owner->Id==$v->cId)
            <td>{{$owner->name}}</td>
            @endif
            @endforeach
            <td><button type="button" class="btn" title="Edit" data-toggle="modal" data-target="#myModal2" data-mytitle="{{$v->vehicleNo}}" ><img src="img\icons8_Pencil_25px.png" /></button>

                <div class="modal fade" id="myModal2" role="dialog">
                    <div class="modal-dialog" style="vertical-align:middle">
    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Select Option</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                                {!! Form::open(['action'=>['vehicleController@edit',$v->vehicleNo],'method'=>'POST']) !!}   
                                <div class="form-group" style="margin-left:20px">
                                        <div class="row">
                                        <p style="text-align:left"><label for="status"><strong>Status :</strong></label></p>
                                        <div class="col-sm-10 " style="margin-left:71px">
                                        <select name="status" class="form-control">
                                        <option value="0">Not at service station</option>
                                        <option value="1">Servicing</option>
                                        </select>
                                        </div>
                                      </div>
                                      </div>
                                      <div class="form-group float-right form-inline">
                                    <div class="form-group">
                                      {{Form::hidden('_method','GET')}}
                                    {{Form::button('<img src="img\icons8_Available_Updates_25px_1.png" />',['type'=>'submit','class'=>'btn'] )}}
                                    </div>
                                    </div>
                              {!! Form::close()!!}

                      </div>
    
                    </div>
                  </div>
            </td>
        </tr>
        @endif
            @endforeach
        </table>
    </div>
      </div>
    </div>
</div>
<script>
    $('#myModal').on('show.bs.modal',function(event){
        var button=$(event.relatedTarget)
        var vehicleNo=button.data('mytitle')
        var lastServiceDay=button.data('myday')
        var type=button.data('mytype')
        var brand=button.data('mybrand')
        var modal=$(this)

        modal.find('.modal-body #vehicleNo').val(vehicleNo);
        modal.find('.modal-body #lastServiceDay').val(lastServiceDay);
        modal.find('.modal-body #type').val(type);
        modal.find('.modal-body #brand').val(brand);

    })
</script>
@endsection
