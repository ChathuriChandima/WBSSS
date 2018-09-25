@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
@section('content')
<div class="container mt-3">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href='#p'>Personal Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#v">Vehicle Details</a>
          </li>
        </ul>
      
        <!-- Tab panes -->
        <div class="tab-content">
          <div id="p" class="container tab-pane active"><br>
            <h2><img src="img\icons8_User_Menu_Male_50px_2.png" >  Personal Profile </h2>
            <div class="container">
                <div class="well">
                    {!! Form::open(['action'=>['customerController@update',$customer->Id], 'method'=>'POST']) !!}
                            <div class="form-group">
                                <p style="text-align:left"><strong>{{Form::label('id','User Id')}} :</strong></p>
                                {{Form::text('id', $customer->Id ,['class'=>'form-control','placeholder'=>'User Id','readonly'])}}
                              </div>
                                <p style="text-align:left"><strong>{{Form::label('name','Name')}}  :</strong></p>
                                {{Form::text('name', $customer->name ,['class'=>'form-control','placeholder'=>'Name','readonly'])}}
                              </div>
                              <br>
                              <div class="form-group">
                                <p style="text-align:left"><strong>{{Form::label('address','Address')}} :</strong></p>
                                {{Form::text('address',$customer->address,['class'=>'form-control','placeholder'=>'Address'])}}
                              </div>
                              <div class="form-group" >
                                  <p style="text-align:left">{{Form::label('email','Email Address')}}</p>
                                  {{Form::text('email', $customer->email ,['class'=>'form-control','placeholder'=>'Email Address', 'readonly'])}}
                                </div>
                                <div class="form-group" >
                                    <p style="text-align:left">{{Form::label('contactNo','Contact Number')}}</p>
                                    {{Form::text('contactNo', $customer->contactNo ,['class'=>'form-control','placeholder'=>'Contact Number'])}}
                                  </div>
                                <br>
                                <div class="form-group float-right form-inline">
                                <div class="form-group">
                                  {{Form::hidden('_method','PUT')}}
                                {{Form::submit('Save Changes',['class'=>'btn btn-success'] )}}
                                </div>
                                <div class="form-group">
                                    <a href="profile" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
                                  </div>
                                </div>
                          {!! Form::close() !!}
                      </div>
            </div>
          </div>
          <div id="v" class="container tab-pane fade"><br>
          </div>
        </div>
      </div>
@endsection