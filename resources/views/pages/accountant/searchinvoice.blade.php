@extends('layouts.log')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <a href="/invoice" class="btn btn-info float-left" style="margin-left:300px;"> Back</a>
        <form action="/searchinvoice" method="POST" role="search" style="margin-left:400px; margin-right:150px;">
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

@section('content')
<div class="container">
     @if($c==1)   
    @if(isset($details))
    <table class="table table-bordered">
            <tr>
                <th style="text-align:center">Invoice No</th>
                <th style="text-align:center">Supplier Name</th>
                <th style="text-align:center">Date</th>
                <th style="text-align:center">Charge</th>
            </tr>
        @foreach ($details as $v)
        <tr>
            <td>{{$v->invoiceNo}}</td>
            @foreach($supplier as $s)
            @if($s->supplierId==$v->SupplierId)
            <td>{{$s->supplierName}}</td>
            @endif
            @endforeach
            <td>{{$v->date}}</td>
            <td>{{$v->price}}</td>
            @endforeach
        </tr>
        </table>
    @endif
    @elseif($c==0)
    @if(isset($details))
    <table class="table table-bordered">
            <tr>
                <th style="text-align:center">Invoice No</th>
                <th style="text-align:center">Supplier Name</th>
                <th style="text-align:center">Date</th>
                <th style="text-align:center">Charge</th>
            </tr>
        @foreach ($details as $u)
        @foreach($invoice as $v)
        @if($u->SupplierId==$v->supplierId)
        <tr>
            <td>{{$v->invoiceNo}}</td>
            <td>{{$u->supplierName}}</td>
            <td>{{$v->date}}</td>
            <td>{{$v->price}}</td>
            @endif
            @endforeach
            @endforeach
        </tr>
        </table>
    @endif
    @endif
</div>
@endsection