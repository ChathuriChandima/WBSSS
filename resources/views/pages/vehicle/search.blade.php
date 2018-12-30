@extends('layouts.log')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
        <form action="/search" method="POST" role="search" style="margin-left:300px; margin-right:150px;">
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
                <th style="text-align:center">Vehicle No</th>
                <th style="text-align:center">Type</th>
                <th style="text-align:center">Last Service Date</th>
                <th style="text-align:center">Brand</th>
                <th style="text-align:center">Owner</th>
                <th width="150px" style="text-align:center">Action</th>
            </tr>
        @foreach ($details as $v)
        <tr>
            <td>{{$v->vehicleNo}}</td>
            <td>{{$v->type}}</td>
            <td>{{$v->lastServiceDay}}</td>
            <td>{{$v->brand}}</td>
            @foreach($customer as $owner)
            @if($owner->Id==$v->cId)
            <td>{{$owner->name}}</td>
            @endif
            @endforeach
            <td>
            <a href="edit/{{$v->vehicleNo}}" class="btn" title="Edit" style="background-color:lavender;"><img src="img\icons8_Edit_25px.png" /></a>
                
                  <!-- delete vehicle-->
                  <button type="button" class="btn" title="Delete" data-toggle="modal" data-target="#myModal4-{{$v->vehicleNo}}" data-mytitle="{{$v->vehicleNo}}"><img src="img\icons8_Trash_25px_1.png" /></button>
    
                  <div class="modal fade" id="myModal4-{{$v->vehicleNo}}" role="dialog">
                      <div class="modal-dialog">
      
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" style="margin-left:200px;"><img src="img\warning.png" /></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body" style="text-align:center;">
                            <h5>Are you sure??? Do you want to delete {{$v->vehicleNo}}?</h5>
                            <h3>If you delete it, it won't be exists anymore!...</h3>
                            <a href="{{route('delete', $v->vehicleNo)}}" class="btn" role="button" style="background-color:bisque"><img src="img\icons8_Trash_25px_1.png" /></a>
                            </div>
                          </div>
        
                        </div>
                      </div>
    
            </td>
            @endforeach
        </tr>
        </table>
    @endif
    @elseif($c==0)
    @if(isset($details))
    <table class="table table-bordered">
            <tr>
                <th style="text-align:center">Vehicle No</th>
                <th style="text-align:center">Type</th>
                <th style="text-align:center">Last Service Date</th>
                <th style="text-align:center">Brand</th>
                <th style="text-align:center">Owner</th>
                <th width="150px" style="text-align:center">Action</th>
            </tr>
        @foreach ($details as $u)
        @foreach($vehicle as $v)
        @if($u->Id==$v->cId)
        <tr>
            <td>{{$v->vehicleNo}}</td>
            <td>{{$v->type}}</td>
            <td>{{$v->lastServiceDay}}</td>
            <td>{{$v->brand}}</td>
            <td>{{$u->name}}</td>
            <td>
            <a href="edit/{{$v->vehicleNo}}" class="btn" title="Edit" style="background-color:lavender;"><img src="img\icons8_Edit_25px.png" /></a>
                
                  <!-- delete vehicle-->
                  <button type="button" class="btn" title="Delete" data-toggle="modal" data-target="#myModal4-{{$v->vehicleNo}}" data-mytitle="{{$v->vehicleNo}}"><img src="img\icons8_Trash_25px_1.png" /></button>
    
                  <div class="modal fade" id="myModal4-{{$v->vehicleNo}}" role="dialog">
                      <div class="modal-dialog">
      
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" style="margin-left:200px;"><img src="img\warning.png" /></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body" style="text-align:center;">
                            <h5>Are you sure??? Do you want to delete {{$v->vehicleNo}}?</h5>
                            <h3>If you delete it, it won't be exists anymore!...</h3>
                            <a href="{{route('delete', $v->vehicleNo)}}" class="btn" role="button" style="background-color:bisque"><img src="img\icons8_Trash_25px_1.png" /></a>
                            </div>
                          </div>
        
                        </div>
                      </div>
    
            </td>
            @endif
            @endforeach
            @endforeach
        </tr>
        </table>
    @endif
    @endif
</div>
@endsection