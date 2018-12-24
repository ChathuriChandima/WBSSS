@extends('layouts.log')
@section('content')
<div class="container mt-3">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href='#p'>Personal Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#v">Vehicle Details</a>
      </li>
    </ul>
  
    <!-- Tab panes -->
    <div class="tab-content">
      <div id="p" class="container tab-pane active"><br>
            <h2><img src="img\icons8_User_Menu_Male_50px_2.png" >  Personal Profile </h2>
            <div class="container">
             
            <form>
                <p style="text-align:left"><label for="userid"><strong style="font-size:large">Customer Id :</strong></label></p>
                <input type="text" class="form-control" id="userid" placeholder={{$customer->Id}} disabled><br>
                <p style="text-align:left"><label for="name"><strong style="font-size:large">Name :</strong></label></p>
                <input type="text" class="form-control" id="name" placeholder={{$customer->name}} disabled><br>
                <p style="text-align:left"><label for="add"><strong style="font-size:large">Address :</strong></label></p>
                <input type="text" class="form-control" id="add" placeholder={{$customer->address}}  disabled><br>
                <p style="text-align:left"><label for="email"><strong style="font-size:large">Email Address :</strong></label></p>
                <input type="text" class="form-control" id="email" placeholder={{$customer->email}} disabled><br>
                <p style="text-align:left"><label for="contact"><strong style="font-size:large">Contact Number :</strong></label></p>
                <input type="number" class="form-control" id="contact" placeholder={{$customer->contactNo}} disabled><br>
            <a href="personal" type="submit" class="btn btn-primary float-right " style="width:70px"  id="edit" title="Edit"><strong>Edit</strong></a>
            </form>
            </div>

        </div>
        <div id="v" class="container tab-pane fade"><br>

            <div class="well">
              <h2><img src="img\icons8_Maintenance_50px_1.png" >  Vehicle Profile </h2>
              <div class="container" style="text-align:left">
                <h3 style="font-size:large"><p style="color:blueviolet"><b> Your Vehicles</b></p></h3><br>
                  @foreach ($vehicle as $v)
                  @if($v->cId==$customer->Id)
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title" style="font-size:medium">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">{{$v->vehicleNo}}</a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                      <div class="panel-body">
                        
                      </div>
                    </div>
                  </div> 
              </div>
              @endif
              @endforeach
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection 