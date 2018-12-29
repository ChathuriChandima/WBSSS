@extends('layouts.log')
<link rel="stylesheet" href="{{asset('my/m.css')}}">

<div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/p2.jpg" width="1600" height="300"style = "padding-left:250px">
      <div class="carousel-caption">
              <h1>RAJAAN MOTORS</h1>
              <h2>Customer Details</h2>

      </div>
</div>
</div>



<div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/p2.jpg" width="1600" height="300"style = "padding-left:250px">
      <div class="carousel-caption">
              <h1>RAJAAN MOTORS</h1>
              <h2>Add Customers</h2>

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
            {!! Form::close() !!}-->
        </td>

    </tr>

    </table>
</div>

@endsection
