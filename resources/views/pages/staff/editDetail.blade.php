@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
@section('content')
            <h2><img src="img\icons8_User_Menu_Male_50px_2.png" >  Personal Profile </h2>
            <div class="container">
                <div class="well">
                    {!! Form::open(['action'=>['staffController@changeDetail'], 'method'=>'POST']) !!}
                              <div class="form-group">
                              <div class="row">
                                  <div class="col-md-4 col-form-label text-md-right">
                                <strong>{{Form::label('name','Name')}}  :</strong>
                                  </div>
                                  <div class="col-md-6">
                                {{Form::text('name', $staff->name ,['class'=>'form-control','placeholder'=>'Name','readonly'])}}
                              </div>
                            </div>
                              </div>
                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-md-4 col-form-label text-md-right">
                                <strong>{{Form::label('address','Address')}} :</strong>
                                      </div>
                                      <div class="col-md-6">
                                {{Form::text('address',$staff->address,['class'=>'form-control','placeholder'=>''])}}
                              </div>
                            </div>
                              </div>
                              <div class="form-group" >
                                  <div class="row">
                                      <div class="col-md-4 col-form-label text-md-right">
                                  <strong>{{Form::label('email','Email Address')}}</strong>
                                      </div>
                                      <div class="col-md-6">
                                  {{Form::text('email', $staff->email ,['class'=>'form-control','placeholder'=>'Email Address', 'readonly'])}}
                                </div>
                              </div>
                                </div>
                                <div class="form-group" >
                                    <div class="row">
                                        <div class="col-md-4 col-form-label text-md-right">
                                    <strong>{{Form::label('contactNo','Contact Number')}}</strong>
                                        </div>
                                        <div class="col-md-6">
                                    {{Form::number('contactNo', '0'.$staff->contactNo ,['class'=>'form-control','placeholder'=>''])}}
                                  </div>
                                </div>
                                  </div>
                                <br>
                                <div class="form-group float-right form-inline">
                                <div class="form-group">
                                {{Form::submit('Save Changes',['class'=>'btn btn-success'] )}}
                                </div>
                                <div class="form-group">
                                    <a href="viewProfile" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
                                  </div>
                                </div>
                          {!! Form::close()!!}
                      </div>
            </div>
@endsection
