@extends('layouts.log')

<link rel="stylesheet" href="{{asset('my/m.css')}}">


<div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/p2.jpg" width="1600" height="300"style = "padding-left:250px">
      <div class="carousel-caption">
              <h1>RAJAAN MOTORS</h1>
              <h2>Stock Details</h2>

      </div>
</div>
</div>
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">

            <a class="btn float-right" href="create" title="New Stock Item"> <img src="img\icons8_Add_New_50px_1.png"  /></a>  

            <a class="btn float-right" href="add_stock" title="New Stock Item"> <img src="img\icons8_Add_New_50px_1.png"  /></a>  

    </div>
</div>
@section('content')


<div class="container">
<table class="table table-bordered">
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Type</th>
            <th>Available Stock</th>
            <th>Purchased Stock</th>
            <th>Sales</th>
            <th>Price</th>
            <th width="200px">Action</th>
        </tr>

        @foreach ($stock as $s)
        <tr>
            <td>{{$s->code}}</td>
            <td>{{$s->name}}</td>
            <td>{{$s->type}}</td>
            <td>{{$s->availableStock}}</td>
            <td>{{$s->purchasedStock}}</td>
            <td>{{$s->soldStock}}</td>
            <td>{{$s->price}}</td>
        <td>

            <a class="btn" href="" title="Edit"><img src="img\icons8_Edit_25px.png" /></a>
            <a class="btn" href="" title="Delete"><img src="img\icons8_Delete_25px_6.png" /></a>

            <!--{!! Form::open(['method' => 'DELETE','style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}-->
        </td>
        @endforeach
    </tr>

    </table>
</div>

@endsection
