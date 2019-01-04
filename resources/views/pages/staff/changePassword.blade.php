@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
@section('content')
            <h2><img src="img\icons8_User_Menu_Male_50px_2.png" >  Change Password </h2>
            <div class="container">
                <div class="well">
                    {!! Form::open(['action'=>['staffController@changePassword'], 'method'=>'POST']) !!}
                              <div class="form-group">
                              <div class="row">
                                  <div class="col-md-4 col-form-label text-md-right">
                                <strong>{{Form::label('currentPasswordLabel','Current Password')}}  :</strong>
                                  </div>
                                  <div class="col-md-6">
                                {{Form::Password('currentPassword')}}
                              </div>
                            </div>
                              </div>
                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-md-4 col-form-label text-md-right">
                                <strong>{{Form::label('newPasswordLabel','New Password')}} :</strong>
                                      </div>
                                      <div class="col-md-6">
                                {{Form::password('newPassword')}}
                              </div>
                            </div>
                              </div>
                              <div class="form-group" >
                                  <div class="row">
                                      <div class="col-md-4 col-form-label text-md-right">
                                  <strong>{{Form::label('verifyPasswordLabel','Verify Password')}}</strong>
                                      </div>
                                      <div class="col-md-6">
                                  {{Form::password('verifyPassword')}}
                                </div>
                              </div>
                                <br>
                                <div class="form-group float-right form-inline">
                                <div class="form-group">
                                  {{Form::hidden('_method','PUT')}}
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
