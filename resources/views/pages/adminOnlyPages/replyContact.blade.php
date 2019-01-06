@extends('layouts.log')

<link rel="stylesheet" href="{{asset('my/v.css')}}">
@section('content')

<div class="container">
  <div class="container mt-3">
    <!-- information of the contact submitted -->
    <div class="card bg-light">
        <div class="card-body">
      <h3>{{$contact->subject}}</h3>
      <br />
      <p>{{$contact->message}}</p>
    </div>
  </div>
    <br />

    <!-- Form to reply the contact -->
    {!! Form::open(['action'=>['contactController@reply'],'method'=>'POST']) !!}
            {{Form::hidden('id',$contact->id,['class'=>'form-control','placeholder'=>''])}}
              <div class="form-group" style="margin-left:20px">
                <div class="row">
                <p style="text-align:left"><strong>{{Form::label('subject','Subject')}}  :</strong></p>
                <div class="col-sm-10 " style="margin-left:80px">
                {{Form::text('subject','Reply: '.$contact->subject,['class'=>'form-control','placeholder'=>''])}}
                </div>
              </div>
              </div>
              <div class="form-group" style="margin-left:20px">
                <div class="row">
                <p style="text-align:left"><strong>{{Form::label('message','Message')}}  :</strong></p>
                <div class="col-sm-10 "style="margin-left:65px">
                {{Form::textarea('message','',['class'=>'form-control','placeholder'=>''])}}
                </div>
              </div>
              </div>
                {{Form::submit('Reply',['class'=>'btn btn-success'] )}}

                    <a href="/contactForm" class="btn btn-danger float-right "  id="cl" ><strong>Cancel</strong></a>
                  </div>
                </div>
          {!! Form::close() !!}
  </div>
</div>
@endsection
