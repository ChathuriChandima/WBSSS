@extends('layouts.log')

<link rel="stylesheet" href="{{asset('my/v.css')}}">
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">

      <a href="add_vehicle" class="btn float-right" title="New Vehicle" style="width:40px; height:40px;"><img src="img\icons8_Add_New_50px_1.png" style="margin-top:-12px; margin-left:-18px;"/></a>
    <form action="/search" method="POST" role="search" style="margin-left:140px; margin-right:150px;">
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
          <div >

          </div>
        <table class="table table-bordered">
                <tr>
                    <th style="text-align:center">Vehicle No</th>
                    <th style="text-align:center">Type</th>
                    <th style="text-align:center">Last Service Date</th>
                    <th style="text-align:center">Brand</th>
                    <th style="text-align:center">Owner</th>
                    <th width="150px" style="text-align:center">Action</th>
                </tr>

            @foreach ($vehicle as $v)
            <tr>
                <td>{{$v->vehicleNo}}</td>
                <td>{{$v->type}}</td>
                <td>{{$v->lastServiceDay}}</td>
                <td>{{$v->brand}}</td>
                <!-- flag of customer found -->
                <?php
                  $found = false;
                ?>

                @foreach($customer as $owner)
                @if($owner->Id==$v->cId)
                <td>{{$owner->name}}</td>
                <?php
                  $found = true;
                ?>

                @endif

                @endforeach
                <!-- printing unknown if flag doesn't activated -->
                @if($found == false)
                <td>{{"Unknown"}}</td>
                @endif
                <td>
                <a href="edit/{{$v->vehicleNo}}" class="btn" title="Edit" style="background-color:lavender;"><img src="img\icons8_Edit_25px.png" /></a>

                      <!-- delete vehicle-->
                      <button type="button" class="btn" title="Delete" data-toggle="modal" data-target="#myModal4-{{$v->vehicleNo}}" data-mytitle="{{$v->vehicleNo}}"><img src="img\icons8_Trash_25px_1.png" /></button>

                      <div class="modal fade" id="myModal4-{{$v->vehicleNo}}" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" style="margin-left:200px;"><img src="img\warning.png" /></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body" style="text-align:center;">
                                <h5>Are you sure??? Do you want to delete {{$v->vehicleNo}}?</h5>
                                <h3>If you delete it, it won't be exists anymore!...</h3>
                                <a href="{{route('delete', $v->vehicleNo)}}" class="btn" role="button" style="background-color:bisque"><img src="img\icons8_Trash_25px_1.png" /></a>
                                </div>
                              </div>

                            </div>
                          </div>

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
                <th width="150px" style="text-align:center">Action</th>
            </tr>
        @foreach ($vehicle as $v)
        @if($v->status=="1")
        <tr>
            <td>{{$v->vehicleNo}}</td>
            <td>{{$v->type}}</td>
            <td>{{$v->lastServiceDay}}</td>
            <td>{{$v->brand}}</td>
            <!-- flag of customer found -->
            <?php
              $found = false;
            ?>

            @foreach($customer as $owner)
            @if($owner->Id==$v->cId)
            <td>{{$owner->name}}</td>
            <?php
              $found = true;
            ?>

            @endif

            @endforeach
            <!-- printing unknown if flag doesn't activated -->
            @if($found == false)
            <td>{{"Unknown"}}</td>
            @endif
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
                                        <option value="2">Finished Service</option>
                                        </select>
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
                                                  <div class="row">
                                                    <p style="text-align:center"><label for="status"><strong>Item ${count + 1} :</strong></label></p>
                                                    <div class="col-sm-10 " style="margin-left:71px">
                                                      <label for="stock"><strong>Name :</strong></label>
                                                      <select name="stock[${count}][name]" class="form-control">
                                                        @foreach($stockNames as $stock)
                                                          <option value= "{{$stock->name}}">{{$stock->name}}</option>
                                                        @endforeach
                                                      </select>
                                                    </div>
                                                  </div>

                                                  <div class="row">
                                                    <div class="col-sm-10 " style="margin-left:71px">
                                                      <label for="quantity"><strong>Quantity :</strong></label>
                                                      <input type="number" name = "stock[${count}][qun]" class = "form-control" value = "0">
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
                                      <a href="#" class="btn btn-danger float-right " style="margin:5px"  id="add" ><strong>ADD</strong></a>
                                      <!-- Stocks data comes here -->
                                      <div class="row">
                                        <p style="text-align:left"><label for="status"><strong>Stocks :</strong></label></p>
                                      </div>

                                      <div id = "container">
                                        <div id = "inner">
                                          <div class="row">
                                            <p style="text-align:center"><label for="status"><strong>Item 1 :</strong></label></p>
                                            <div class="col-sm-10 " style="margin-left:71px">
                                              <label for="stock"><strong>Name :</strong></label>
                                              <!-- <input type="text" name = "stock[0][name]" class = "form-control"> -->
                                              <select name="stock[0][name]" class="form-control">
                                                @foreach($stockNames as $stock)
                                                  <option value= "{{$stock->name}}">{{$stock->name}}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="col-sm-10 " style="margin-left:71px">
                                              <label for="quantity"><strong>Quantity :</strong></label>
                                              <input type="number" name = "stock[0][qun]" class = "form-control" value ="0">
                                            </div>
                                          </div>
                                        </div>
                                      </div>


                                      <!-- service data comes here -->
                                      <div class="row">
                                        <p style="text-align:left"><label for="status"><strong>Service :</strong></label></p>
                                        <div class="col-sm-10 " style="margin-left:71px">
                                          <label for="sname"><strong>Name :</strong></label>
                                          <select name="sname" class="form-control">
                                            <option value="Full Service"> Full Service</option>
                                            <option value="Oil & Filter Change"> Oil & Filter Change</option>
                                            <option value="Engine Cleaning"> Engine Cleaning</option>
                                            <option value="Car Wash"> Car Wash</option>
                                            <option value="Undercarriage Wash"> Undercarriage Wash</option>
                                            <option value="Other">Other</option>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-sm-10 " style="margin-left:71px">
                                          <label for="sericeCharge"><strong>Service Charge :</strong></label>
                                          {{Form::number('serviceCharge', '0' ,['class'=>'form-control','placeholder'=>''])}}
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-sm-10 " style="margin-left:71px">
                                          <label for="discount"><strong>Discount :</strong></label>
                                          {{Form::number('discount', '0' ,['class'=>'form-control','placeholder'=>''])}}
                                        </div>
                                      </div>

                                      <div class="form-group float-right form-inline">
                                        <div class="form-group">

                                          <input type="hidden" id="count" name="count" value="1">

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
                <th width="150px" style="text-align:center">Action</th>
            </tr>
        @foreach ($vehicle as $v)
        @if($v->status=="2")
        <tr>
            <td>{{$v->vehicleNo}}</td>
            <td>{{$v->type}}</td>
            <td>{{$v->lastServiceDay}}</td>
            <td>{{$v->brand}}</td>
            <!-- flag of customer found -->
            <?php
              $found = false;
            ?>

            @foreach($customer as $owner)
            @if($owner->Id==$v->cId)
            <td>{{$owner->name}}</td>
            <?php
              $found = true;
            ?>

            @endif

            @endforeach
            <!-- printing unknown if flag doesn't activated -->
            @if($found == false)
            <td>{{"Unknown"}}</td>
            @endif
            <td>
                  <a href="edit/{{$v->vehicleNo}}" class="btn" title="Edit" style="background-color:lavender;"><img src="img\icons8_Edit_25px.png" /></a>
            </td>
        </tr>
        @endif
            @endforeach
        </table>
    </div>
      </div>
    </div>
</div>
@endsection
