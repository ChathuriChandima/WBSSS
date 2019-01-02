@extends('layouts.log')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <a href="/services" class="btn btn-info float-left" style="margin-left:300px;"> Back</a>
        <form action="/searchservice" method="POST" role="search" style="margin-left:400px; margin-right:150px;">
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
                <th style="text-align:center">Service code</th>
                <th style="text-align:center">Service Name</th>
                <th style="text-align:center">Price</th>
                <th style="text-align:center">Discount</th>
                <th width="150px" style="text-align:center">Action</th>
            </tr>
        @foreach ($details as $s)
        <tr>
            <td>{{$s->sid}}</td>
            <td>{{$s->name}}</td>
            <td>{{$s->price}}</td>
            <td>{{$s->discount}}</td>
            <td>
                <a href="editservice/{{$s->sid}}" class="btn" title="Edit" style="background-color:lavender;"><img src="img\icons8_Edit_25px.png" /></a>
            
                <!-- delete vehicle-->
                <button type="button" class="btn" title="Delete" data-toggle="modal" data-target="#myModal4-{{$s->sid}}" data-mytitle="{{$s->sid}}"><img src="img\icons8_Trash_25px_1.png" /></button>
                <div class="modal fade" id="myModal4-{{$s->sid}}" role="dialog">
                  <div class="modal-dialog">
  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" style="margin-left:200px;"><img src="img\warning.png" /></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body" style="text-align:center;">
                        <h5>Are you sure??? Do you want to delete {{$s->sid}}?</h5>
                        <h3>If you delete it, it won't be exists anymore!...</h3>
                        <a href="{{route('deleteservice', $s->sid)}}" class="btn" role="button" style="background-color:bisque"><img src="img\icons8_Trash_25px_1.png" /></a>
                        </div>
                      </div>
    
                    </div>
                  </div>
            </td>
            @endforeach
        </tr>
        </table>
    @endif
</div>
@endsection