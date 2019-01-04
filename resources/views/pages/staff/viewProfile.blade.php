@extends('layouts.log')
@section('content')
<link rel="stylesheet" href="{{asset('my/v.css')}}">
<div class="container">

    <!-- Tab panes -->
    <div class="tab-content">
      <br>

            <div class="container">
            <form>

                <div class="row">
                    <div class="col-md-4 col-form-label text-md-right">
                <label for="name"><strong>Name :</strong></label>
                    </div>
                <div class="col-md-6 ">
                <input type="text" class="form-control" id="name" placeholder={{$staff->name}} disabled><br>
              </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-form-label text-md-right">
                <label for="add"><strong>Address :</strong></label>
                    </div>
                    <div class="col-md-6 ">
                <input type="text" class="form-control" id="add" placeholder={{$staff->address}}  disabled><br>
              </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-form-label text-md-right">
                <label for="email"><strong>Email Address :</strong></label>
                    </div>
                    <div class="col-md-6 ">
                <input type="text" class="form-control" id="email" placeholder={{$staff->email}} disabled><br>
              </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-form-label text-md-right">
                <label for="contact"><strong>Contact Number :</strong></label>
                    </div>
                <div class="col-md-6">
                <input type="number" class="form-control" id="contact" placeholder={{"0".$staff->contactNo}} disabled><br>
              </div>
                </div>
                <div class="form-group">
                    <a href="editStaffDetail" type="submit" class="btn btn-primary float-right " style="margin-right:165px" title="Edit"><strong>Edit</strong></a>
                    <a href="staffPasswordChange" type="submit" class="btn btn-primary float-right " style="margin-right:165px" title="ChangePassword"><strong>Change Password</strong></a>
                  </div>
            </form>
            </div>

    </div>
  </div>
@endsection
