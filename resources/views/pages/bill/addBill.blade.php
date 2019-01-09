@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
@section('content')
    <h2 style="margin-top:-30px;"><img src="img\bill.png">  New Bill </h2>
    <br>
    <div class="container">
      {!! Form::open(['action'=>'billController@store','method'=>'POST']) !!}

        <!-- Bill NO -->
        <div class="form-group">
          <div class="row">
            <div class="col-md-4 col-form-label text-md-right">
              <strong>{{Form::label('billNo','Bill No')}} :</strong>
            </div>
            <div class="col-md-6 ">
              {{Form::text('billNo',$id,['class'=>'form-control float-right','placeholder'=>'','readonly'])}}
            </div>
          </div>
        </div>

        <!-- Billing data -->
        <div class="form-group">
          <div class="row">
            <div class="col-md-4 col-form-label text-md-right">
              <strong>{{Form::label('date','Billed Date')}}  :</strong>
            </div>
            <div class="col-md-6">
              {{Form::text('date',date('m/d/Y'),['class'=>'form-control','placeholder'=>'','id'=>'datepicker'])}}
            </div>
            <script>
              $('#datepicker').datepicker();
            </script>
          </div>
        </div>

        <!-- Vehicle No -->
        <div class="form-group">
              <div class="row">
                <div class="col-md-4 col-form-label text-md-right">
                  <strong>{{Form::label('vehicleNo','Vehicle No')}}  :</strong>
                </div>
              <div class="col-md-6">
                <input list="v" name="vehicleNo" class="form-control">
                <datalist id="v">
                    @foreach($vehicle as $v)
                <option value="{{$v->vehicleNo}}">
                    @endforeach
                </datalist>
              </div>
            </div>
          </div>

          <!-- Submit button -->
          <div class="form-group float-right form-inline" style="margin-right:180px">
            <div class="form-group">

              {{Form::submit('Add',['class'=>'btn btn-success'] )}}
            </div>
            <div class="form-group">
                <a href="/bills" class="btn btn-danger float-right " style="margin:5px"  id="cl" ><strong>Cancel</strong></a>
            </div>
          </div>

        <!-- End of the form -->
        {!! Form::close() !!}
      </div>
@endsection
