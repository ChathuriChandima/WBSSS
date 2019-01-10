@extends('layouts.log')
@section('content')
<!-- Search a stock item using code or name or type-->
<div class="row">
    <div class="col-lg-12 margin-tb">
        <a href="/stocks" class="btn btn-info float-left" style="margin-left:300px;"> Back</a>
        <form action="/searchstock" method="POST" role="search" style="margin-left:400px; margin-right:150px;">
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
    @if(isset($details))
    <table class="table table-bordered">
            <tr>
                <th>Code</th>
            <th>Name</th>
            <th>Type</th>
            <th>Available Stock</th>
            <th>Purchased Stock</th>
            <th>Sales</th>
            <th>Price</th>
            <th width="150px" style="text-align:center">Action</th>
            </tr>
        @foreach ($details as $s)
        <tr>
            <td>{{$s->code}}</td>
            <td>{{$s->name}}</td>
            <td>{{$s->type}}</td>
            <td>{{$s->availableStock}}</td>
            <td>{{$s->purchasedStock}}</td>
            <td>{{$s->soldStock}}</td>
            <td>{{$s->price}}</td>
            <td>
                <a href="" class="btn" title="Edit" style="background-color:lavender;"><img src="img\icons8_Edit_25px.png" /></a>
            
                <!-- delete vehicle-->
                <button type="button" class="btn" title="Delete" data-toggle="modal" data-target="#myModal4-{{$s->sid}}" data-mytitle="{{$s->sid}}"><img src="img\icons8_Trash_25px_1.png" /></button>

            </td>
            @endforeach
        </tr>
        </table>
    @endif
</div>
@endsection