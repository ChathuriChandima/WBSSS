@extends('layouts.log')
<link rel="stylesheet" href="{{asset('my/u.css')}}">
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="padding-right: 30px">
                <h1>Insert New Vehicle</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/vehicles" style="top-right: 30px"> Back</a>
                <br> <br>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container" style="padding-right:50px">
    <form  class="form-container border border-warning rounded" style="width:1000px">
    {!! Form::open(array('action' => 'vehicleController@store','method'=>'POST')) !!}
    
    <div class="row">


        <div class=" col-sm-12 col-md-12">
            
                <strong>Vehicle No:</strong>
                {!! Form::text('vehicleNo', null, array('placeholder' => 'Vehicle No','class' => 'form-control')) !!}
            
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Type:</strong>
                    {!! Form::text('type', null, array('placeholder' => 'Type','class' => 'form-control')) !!}
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Brand:</strong>
                    {!! Form::text('brand', null, array('placeholder' => 'Brand','class' => 'form-control')) !!}
                    <br> <br>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Create</button>
                <br> <br>
        </div>
    </div>

    </div>
    {!! Form::close() !!}
    </form>
    </div>

@endsection
