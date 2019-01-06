@extends('layouts.app')
<link rel="stylesheet" href="{{asset('my/l.css')}}">
@section('content')
<img src="img/p1.jpg" width="1400px" height="300px">

      <h1><img src="img/contact.gif" width="200px" ></h1>
    <br><br><br>
    <img src="img/email.jpg" width="60px" >
    <style>
       .container1{ font-size: 20px;
            text-align: center;
            }

    </style>
        <div class="container1">
            Contact No : 033-22-77616<br>
            Email  :raajan@gmail.com<br>
            Address :No. 210/5, <br>
            Weerangula South <br>
            Yakkala <br>
        </div>
    <div class="container">
        <!-- <form action="/contactSubmit" class="form-container border border-warning rounded" style="width:600px" method="post"> -->
        {!! Form::open(['action'=>['contactController@store'],'method'=>'POST', 'class' => 'form-container border border-warning rounded']) !!}
               <h1 style="color:goldenrod">LET'S GET IN TOUCH!</h1>
               <p>Feel free to contact us for more information</p>
                        <label for="phone" style="color:goldenrod"><p style="text-align:left">Phone No. : </label>

                        {{Form::text('phone','',['class'=>'form-control form-control-lg text-white bg-dark border border-warning rounded','placeholder'=>'Phone Number'])}}
                        <label for="email" style="color:goldenrod">Email : </label>

                        {{Form::text('email','',['class'=>'form-control form-control-lg text-white bg-dark border border-warning rounded','placeholder'=>'Email'])}}
                        <label for="subject" style="color:goldenrod">Subject : </label>

                        {{Form::text('subject','',['class'=>'form-control form-control-lg text-white bg-dark border border-warning rounded','placeholder'=>'Subject'])}}
                        <label for="message" style="color:goldenrod">Message :</label>

                        {{Form::textarea('message','',['class'=>'form-control form-control-lg text-white bg-dark border border-warning rounded','placeholder'=>'Write Something'])}}
                        <br>

                        {{Form::submit('Submit',['class'=>'btn btn-warning float-right'] )}}
        <!-- </form> -->
        {!! Form::close() !!}
    </div>



@endsection
