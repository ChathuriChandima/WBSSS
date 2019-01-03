@extends('layouts.log')

<link rel="stylesheet" href="{{asset('my/m.css')}}">
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">

            <a class="btn float-right" href="create" title="New Stock Item" style="width:40px; height:40px;"> <img src="img\icons8_Add_New_50px_1.png" style="margin-top:-12px; margin-left:-22px;" /></a>  
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
            <a href="editstock/{{$s->code}}" class="btn" title="Edit" style="background-color:lavender;"><img src="img\icons8_Edit_25px.png" /></a>
            
              <!-- delete vehicle-->
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
        
        @endforeach
    </tr>

    </table>
</div>
<div id="editModal-" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h4 >Edit Stock</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
                
            </div>
            <div class="modal-body">
               
                
                    {!! Form::open(['action'=>['stockController@update',$s->code],'method'=>'POST']) !!}  
                    {{ csrf_field() }}

                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="row">
                        <label class="control-label col-sm-4" style="text-align:right" for="code">Code:</label>
                        <div class="col-sm-8">
                                {{Form::text('code', $s->code ,['class'=>'form-control','placeholder'=>'','readonly'])}}
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row"> 
                        <label class="control-label col-sm-4" style="text-align:right" for="name">Name:</label>
                        <div class="col-sm-8">
                                {{Form::text('name', $s->name ,['class'=>'form-control','placeholder'=>'','readonly'])}}
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <label class="control-label col-sm-4" style="text-align:right" for="type">Type:</label>
                        <div class="col-sm-8">
                                {{Form::text('type', $s->type ,['class'=>'form-control','placeholder'=>'','readonly'])}}
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <label class="control-label col-sm-4" style="text-align:right" for="purchasedStock">Purchased Stock:</label>
                        <div class="col-sm-8">
                                {{Form::text('purchasedStock', $s->purchasedStock ,['class'=>'form-control','placeholder'=>''])}}
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">        
                        <label class="control-label col-sm-4" style="text-align:right" for="soldStock">Sold Stock:</label>
                        <div class="col-sm-8">
                                {{Form::text('soldStock', $s->soldStock ,['class'=>'form-control','placeholder'=>''])}}
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <label class="control-label col-sm-4" style="text-align:right" for="availableStock">Available Stock:</label>
                        <div class="col-sm-8">
                                {{Form::text('availableStock', $s->availableStock ,['class'=>'form-control','placeholder'=>''])}}                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <label class="control-label col-sm-4" style="text-align:right" for="price">Unit Price:</label>
                        <div class="col-sm-8">
                                {{Form::text('price', $s->price ,['class'=>'form-control','placeholder'=>''])}}                        </div>
                        </div>
                    </div>
                
                <div class="modal-footer">
                        <div class="form-group">
                          {{Form::hidden('_method','GET')}}
                        {{Form::button('<img src="img\icons8_Available_Updates_25px_1.png" />',['type'=>'submit','class'=>'btn'] )}}
                        </div>
                        </div>
                  {!! Form::close()!!}
                </form>
                 
            </div>
        </div>
    </div>
</div>

    <!-- Modal form to delete a form -->
    <div id="deleteModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                            <h4 class="text-center">Are you sure you want to delete the following post?</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                                <span id="" class='glyphicon glyphicon-trash'></span> Yes
                            </button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                <span class='glyphicon glyphicon-remove'></span> No
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
@endsection
