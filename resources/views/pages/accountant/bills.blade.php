@extends('layouts.log')
<link rel="stylesheet" href="{{asset('my/l.css')}}">
@section('content')
<div>
        @include('elements.sidebar')
    </div>


<div class = "container" style =  "margin-top: 40px">
        <h2> Print Bills   </h2>
</div>

<div class="container" >
    
    <form  class="form-container border border-warning rounded" style="width:600px">
    <div class="row">
        <div class="span4">
            <img src="img/logo.png" class="img-rounded logo">
            <address>
                <strong>Raajan Motors</strong><br>
                No.210/5 <br>
                Weerangala South<br>
                Yakkala <br>
            </address>
        </div>
        <div class="span4 well">
            <table class="invoice-head">
                <tbody>
                       
                    <tr>
                        <td class="pull-right"  style ="padding-right:40px"><strong>Customer Name </strong></td>
                        <td><input type="text" style="margin-bottom: 10px"  ></td>
                    </tr>
                        
                   
                    <tr>
                        <td class="pull-right"><strong>Bill No.</strong></td>
                        <td><input type="text"  style="margin-bottom: 10px" ></td>
                    </tr>
                    <tr>
                        <td class="pull-right"><strong>Date</strong></td>
                        <td><input type="text"  style="margin-bottom: 10px" ></td>
                    </tr>
                    
                    
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="row">
          <div class="span8 well invoice-body">
              <table class="table table-bordered" style = "font-size:10px">
                <thead>
                    <tr>
                        <th>Service Description</th>
                        <th>Date From</th>
                        <th>Date To</th>
                        <th>Vehicle No.</th>
                        <th>Charges/Tax</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    
                    </tr><tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><strong>Total</strong></td>
                        <td contenteditable="true"><strong></strong></td>
                    </tr>
                </tbody>
            </table>
          </div>
      </div>
      <div class="row">
          <div class="span8 well invoice-thank">
              <h5 style="text-align:center;">Thank You!</h5>
          </div>
      </div>
      <div class="row">
          <div class="span3" style="padding-right:50px">
              <strong>Phone:</strong> <a href="tel:033-22-77616">033-22-77616</a>
          </div>
          <div class="span3" style ="padding-right:80px">
              <strong>Email:</strong> <a href="https://accounts.google.com/ServiceLogin/signinchooser?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F%3Frli%3Dn4mf18sk0chx%26rld%3D1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin">raajan@gmail.com</a><br>
          <br>
            </div>
          

      </div>
</div>



