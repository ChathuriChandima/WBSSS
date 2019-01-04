@extends('layouts.log')

<link rel="stylesheet" href="{{asset('my/v.css')}}">
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        
      
    <form action="/searchCustomer" method="POST" role="search" style="margin-left:140px; margin-right:150px;">
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

<div class="row">
    <div class="col-lg-12 margin-tb">

            <a class="btn float-right" href="addCustomer" title="New Customer"> <img src="img\icons8_Add_New_50px_1.png"  /></a>


    </div>
</div>
@section('content')

<!--
<div class="container">
<table class="table table-bordered">
        <tr>

            <th>Name</th>
            <th>Address</th>
            <th>Contact No</th>
            <th>Email</th>
            <th width="200px">Action</th>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        <td>

            <a class="btn" href="" title="Edit"><img src="img\icons8_Edit_25px.png" /></a>
            <a class="btn" href="" title="Delete"><img src="img\icons8_Delete_25px_6.png" /></a>

            <!--{!! Form::open(['method' => 'DELETE','style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}-a->
        </td>

    </tr>

    </table>
</div>
--->

@section('content')
<div class="container">
<table class="table table-bordered">
        <tr>
            <th style="text-align:center">Id</th>
            <th style="text-align:center">Name</th>
            <th style="text-align:center">Address</th>
            <th style="text-align:center">Contact No</th>
            <th style="text-align:center">Email</th>
            
            <th width="150px" style="text-align:center">Action</th>
        </tr>
    @foreach ($customer as $v)
    <tr>
        <td>{{$v->Id}}</td>
        <td>{{$v->name}}</td>
        <td>{{$v->address}}</td>
        <td>{{$v->contactNo}}</td>
        <td>{{$v->email}}</td>
        <td>
        <a href="editCustomer/{{$v->Id}}" class="btn" title="Edit" style="background-color:lavender;"><img src="img\icons8_Edit_25px.png" /></a>
            
              <!-- delete customer-->
              <button type="button" class="btn" title="Delete" data-toggle="modal" data-target="#myModal4-{{$v->Id}}" data-mytitle="{{$v->Id}}"><img src="img\icons8_Trash_25px_1.png" /></button>

              <div class="modal fade" id="myModal4-{{$v->Id}}" role="dialog">
                  <div class="modal-dialog">
  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" style="margin-left:200px;"><img src="img\warning.png" /></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body" style="text-align:center;">
                        <h5>Are you sure??? Do you want to delete {{$v->Id}}?</h5>
                        <h3>If you delete it, it won't be exists anymore!...</h3>
                        <a href="deletee/{{$v->Id}}" class="btn" role="button" style="background-color:bisque"><img src="img\icons8_Trash_25px_1.png" /></a>
                        </div>
                      </div>
    
                    </div>
                  </div>

        </td>
        @endforeach
    </tr>
    </table>
</div>
@endsection