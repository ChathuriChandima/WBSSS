@extends('layouts.log')
<link rel="stylesheet" href="{{asset('my/m.css')}}">
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <!-- Add a new stock item -->
      <a class="btn float-right" href="create" title="New Stock Item" style="width:40px; height:40px;"> <img src="img\icons8_Add_New_50px_1.png" style="margin-top:-12px; margin-left:-22px;" /></a>  
      <!-- Search a stock item using code or name or type-->
        <form action="/searchstock" method="POST" role="search" style="margin-left:140px; margin-right:150px;">
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

<div class="container">
  <table class="table table-bordered">
    <tr>
      <th>Code</th>
      <th>Name</th>
      <th>Type</th>
      <th>Purchased Stock</th>
      <th>Sales</th>
      <th>Available Stock</th>
      <th>Price</th>
      <th width="200px">Action</th>
    </tr>
    @foreach ($stock as $s)
      <tr>
        <td>{{$s->code}}</td>
        <td>{{$s->name}}</td>
        <td>{{$s->type}}</td>
        <td>{{$s->purchasedStock}}</td>
        <td>{{$s->soldStock}}</td>
        <td>{{$s->availableStock}}</td>
        <td>{{$s->price}}</td>
        <td>
          <!-- edit stock item-->
          <a href="editstock/{{$s->code}}" class="btn" title="Edit" style="background-color:lavender;"><img src="img\icons8_Edit_25px.png" /></a>  
              <!-- delete stock item using a  modal-->
              <button type="button" class="btn" title="Delete" data-toggle="modal" data-target="#myModal4-{{$s->code}}" data-mytitle="{{$s->code}}"><img src="img\icons8_Trash_25px_1.png" /></button>
                <div class="modal fade" id="myModal4-{{$s->code}}" role="dialog">
                  <div class="modal-dialog">
                  <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" style="margin-left:200px;"><img src="img\warning.png" /></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body" style="text-align:center;">
                        <h5>Are you sure??? Do you want to delete {{$s->code}}?</h5>
                        <h3>If you delete it, it won't be exists anymore!...</h3>
                        <a href="{{route('deletestock', $s->code)}}" class="btn" role="button" style="background-color:bisque"><img src="img\icons8_Trash_25px_1.png" /></a>
                      </div>
                    </div>
                  </div>
                </div>
        </td>
      </tr>
    @endforeach
  </table>
</div>        
@endsection
