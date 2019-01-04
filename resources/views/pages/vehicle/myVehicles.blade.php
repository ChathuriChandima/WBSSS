@extends('layouts.log')

<link rel="stylesheet" href="{{asset('my/v.css')}}">
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
        </tr>

    @foreach ($vehicle as $v)
    <tr>
        <td>{{$v->vehicleNo}}</td>
        <td>{{$v->type}}</td>
        <td>{{$v->lastServiceDay}}</td>
        <td>{{$v->brand}}</td>
        <td>{{Auth::user()->name}}</td>


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
            <td>{{Auth::user()->name}}</td>

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
            <td>{{Auth::user()->name}}</td>

        </tr>
        @endif
            @endforeach
        </table>
    </div>
      </div>
    </div>
</div>
@endsection
