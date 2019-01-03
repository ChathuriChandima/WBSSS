@extends('layouts.log')
<link rel="stylesheet" href="{{asset('my/l.css')}}">
@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                
              <a href="/addBill" class="btn float-right" title="New Bill" style="width:40px; height:40px;"><img src="img\icons8_Add_New_50px_1.png" style="margin-top:-12px; margin-left:-22px;"/></a>
              <form action="/searchbill" method="POST" role="search" style="margin-left:140px; margin-right:150px;">
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
                        <th>Bill No</th>
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Vehicle No</th>
                        <th>Service Description</th>
                        <th>Spare Parts Added</th>
                        <th>Price</th>
                        <th width="200px">Action</th>
                    </tr>
            
                    @foreach ($bill as $b)
                    <tr>
                        <td>{{$b->billNo}}</td>
                        <td>{{$b->date}}</td>
                        <td>{{$b->customerName}}</td>
                        <td>{{$b->vehicleNo}}</td>
                        <td>{{$b->serviceDescription}}</td>
                        <td>{{$b->addedParts}}</td>
                        <td>{{$b->price}}</td>
                    <td>
                        <a href="editbill/{{$b->billNo}}" class="btn" title="Edit" style="background-color:lavender;"><img src="img\icons8_Edit_25px.png" /></a>
                    
                      <!-- delete bill-->
                      <button type="button" class="btn" title="Delete" data-toggle="modal" data-target="#myModal-{{$b->billNo}}" data-mytitle="{{$b->billNo}}"><img src="img\icons8_Trash_25px_1.png" /></button>
                      <div class="modal fade" id="myModal-{{$b->billNo}}" role="dialog">
                        <div class="modal-dialog">
        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" style="margin-left:200px;"><img src="img\warning.png" /></h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body" style="text-align:center;">
                              <h5>Are you sure??? Do you want to delete {{$b->billNo}}?</h5>
                              <h3>If you delete it, it won't be exists anymore!...</h3>
                              <a href="{{route('deletebill', $b->billNo)}}" class="btn" role="button" style="background-color:bisque"><img src="img\icons8_Trash_25px_1.png" /></a>
                              </div>
                            </div>
          
                          </div>
                        </div>
                        <a href="printbill/{{$b->billNo}}" class="btn" title="print" style="background-color:lavender;"><img src="img\print.png" /></a>
                    </td>
                    
                    @endforeach
                </tr>
            
                </table>
            </div>
        @endsection