@extends('layouts.log')
@section('content')
<div class="container">
  <div class="well">
      {!! Form::open(['action'=>['vehicleController@update',$vehicle->vehicleNo],'method'=>'POST']) !!}
      <div class="form-group">
        <div class="row">
        <div class="col-md-4 col-form-label text-md-right">
        <strong>{{Form::label('id','Vehicle No')}} :</strong>
        </div>
        <div class="col-md-6">
        {{Form::text('id', $vehicle->vehicleNo ,['class'=>'form-control','placeholder'=>'','readonly'])}}
        </div>
      </div>
      </div>
      <div class="form-group">
          <div class="row">
          <div class="col-md-4 col-form-label text-md-right">
          <strong>{{Form::label('lastServiceDay','Last Service Day')}} :</strong>
          </div>
          <div class="col-md-6">
            {{Form::text('lastServiceDay', date('m/d/Y',strtotime($vehicle->lastServiceDay )),['class'=>'form-control','id'=>'datepicker','placeholder'=>''])}} 
        <script>
            $('#datepicker').datepicker();
            </script>
        </div>
        </div>
        </div>
        <div class="form-group">
            <div class="row">
            <div class="col-md-4 col-form-label text-md-right">
            <strong>{{Form::label('cId','Owner')}} :</strong>
            </div>
            <div class="col-md-6">
                <select name="cId" class="form-control">
                    @foreach($customer as $owner)
                    @if($owner->Id==$vehicle->cId)
                    <option value="{{$owner->Id}}">{{$owner->name}}</option>
                    @endif
                  @endforeach
                  @foreach($customer as $owner)
                    @if($owner->Id!=$vehicle->cId)
                    <option value="{{$owner->Id}}">{{$owner->name}}</option>
                    @endif
                  @endforeach
                  </select> 
            </div>
          </div>
          </div>
          <div class="form-group">
            <div class="row">
            <div class="col-md-4 col-form-label text-md-right">
            <label for="status"><strong>Status :</strong></label>
            </div>
            <div class="col-md-6">
            <select name="status" class="form-control">
            <option value="0">Not at service station</option>
            <option value="1">Servicing</option>
            <option value="2">Finished Service</option>
            </select>
            </div>
          </div>
          </div>
          <br>
          <div class="form-group float-right form-inline " style="margin-right:180px;">
          <div class="form-group">
            {{Form::hidden('_method','PUT')}}
          {{Form::submit('Save',['class'=>'btn btn-success'] )}}
          </div>
          <div class="form-group">
              <a href="/vehicles" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
            </div>
          </div>
      {!! Form::close() !!}
  </div>
</div>  
@endsection