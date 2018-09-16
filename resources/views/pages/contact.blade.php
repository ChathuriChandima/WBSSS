@extends('layouts.app')
<link rel="stylesheet" href="{{asset('my/l.css')}}">
@section('content')
<img src="img/p1.jpg" width="1400px" height="300px">
    <img src="img/ic.png" width="70px" >
      <h1><img src="img/contact.gif" width="200px" ></h1>
    <br><br><br>
    
    <div class="container">
        <form action="/contact.blade.php" class="form-container border border-warning rounded" style="width:600px">
               <h1 style="color:goldenrod">LET'S GET IN TOUCH!</h1>
               <p>Feel free to contact us for more information</p>
                        <label for="name" style="color:goldenrod"><p style="text-align:left">Name : </label>
                        <input type="text" class="form-control form-control-lg text-white bg-dark border border-warning rounded" id="name" placeholder="Name">
                        <label for="contact" style="color:goldenrod">Contact No : </label>
                        <input type="text" class="form-control form-control-lg text-white bg-dark border border-warning rounded" id="contact" placeholder="Phone number">
                        <label for="subject" style="color:goldenrod">Subject :</label>
                        <textarea class="form-control form-control-lg text-white bg-dark border border-warning rounded" id="subject"  placeholder="Write something.." ></textarea><br>
                        <button type="submit" class="btn btn-warning float-right" >Submit</button>
        </form>
    </div>
@endsection