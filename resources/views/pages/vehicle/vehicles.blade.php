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
        <div >
            <br>
            <a class="btn float-right" href="" title="New Vehicle"> <img src="img\icons8_Add_New_50px_1.png"  /></a> 
            <br>
        </div>
    </div>
</div>
@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
        <tr>
            <th>Vehicle No</th>
            <th>Type</th>
            <th>Description</th>
            <th>Brand</th>
            <th>C ID</th>
            <th width="280px">Action</th>
        </tr>
    
    <tr>
       
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <a class="btn" href="" title="View"><img src="img\icons8_Eye_25px_1.png" /></a>
            <a class="btn" href="" title="Edit"><img src="img\icons8_Edit_25px.png" /></a>
            <a class="btn" href="" title="Delete"><img src="img\icons8_Delete_25px_6.png" /></a>

 
            <!--{!! Form::open(['method' => 'DELETE','style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}-->
            {!! Form::close() !!}
        </td>
    </tr>
   
    </table>
   
@endsection

