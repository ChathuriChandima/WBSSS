@extends('layouts.log')
@section('content')
<script type="text/javascript">
function printlayer(Layer){
      var generator=window.open(",'name,");
      var laytext=document.getElementById(Layer);
      generator.document.write(laytext.innerHTML.replace("Print Me"));

      generator.document.close();
      generator.print();
      generator.close();
}
</script>
<div class="container">
   <a href="#" class="btn btn-success float-right" id="print" onclick="javascript:printlayer('c')">Download</a>
  <div class="well" id="c">

      {!! Form::open(['action'=>['billController@downloadPdf',$bill->billNo]]) !!}
      <div class="form-group">
            <div class="row">
            <div class="col-md-6 col-form-label text-md-left">
                    <h1 ><img src="\img\ic.png"> Rajaan Motors </h1>
                  </div>
                  <div class="col-md-1 col-form-label text-md-left">
                        <strong>Phone:</strong><br>
                        <strong>Email:</strong>
                    </div>
                    <div class="col-md-2 col-form-label text-md-left">
                         <a href="tel:033-22-77616">033-22-77616</a><br>
                         <a href="https://accounts.google.com/ServiceLogin/signinchooser?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F%3Frli%3Dn4mf18sk0chx%26rld%3D1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin">raajan@gmail.com</a><br>
  <br>
                  </div>
                  <div class="col-md-3 ">
                    </div>
          </div>
        </div>
      <div class="form-group">
            <div class="row">
            <div class="col-md-3 col-form-label text-md-left">
              <strong>{{Form::label('billNo','Bill No')}} :</strong>
                </div>
              <div class="col-md-2 col-form-label text-md-left">
                {{Form::label('billNo',$bill->billNo)}}
              </div><div class="col-md-2 col-form-label text-md-left">
                    <strong>{{Form::label('date','Billed Date')}}  :</strong>
                    </div>
                    <div class="col-md-2 col-form-label text-md-left">
                    {{Form::label('date',$bill->date)}}
                    </div>

            </div>
            </div>
            <div class="form-group">
                    <div class="row">
                    <div class="col-md-3 col-form-label text-md-left">
                      <strong>{{Form::label('customerName','Customer Name')}} :</strong>
                        </div>
                      <div class="col-md-2 col-form-label text-md-left">
                        {{Form::label('customerName',$bill->customerName)}}
                      </div><div class="col-md-2 col-form-label text-md-left">
                            <strong>{{Form::label('vehicleNo','Vehicle No')}}  :</strong>
                            </div>
                            <div class="col-md-2 col-form-label text-md-left">
                            {{Form::label('vehicleNo',$bill->vehicleNo)}}
                            </div>
        
                    </div>
                    </div>
                    <div class="form-group">
                            <div class="row">
                            <div class="col-md-5 ">
                                  
                                  </div>
                                  <div class="col-md-4 col-form-label text-md-left">
                                  **********************************************
                                  </div>
                          </div>
                          </div>
                    <div class="form-group">
                          <div class="row">
                          <div class="col-md-3 col-form-label text-md-left">
                          <strong>{{Form::label('serviceDescription','Service Description')}}  :</strong>
                          </div>
                          <div class="col-md-2 col-form-label text-md-left">
                          {{Form::label('serviceDescription',$bill->serviceDescription)}}
                          </div>
                          <div class="col-md-2 col-form-label text-md-left">
                                <strong>{{Form::label('price1','Price')}}  :</strong>
                                </div>
                                <div class="col-md-2 col-form-label text-md-left">
                                {{Form::label('price1',$bill->serviceCharge)}}
                                </div>
                        </div>
                        </div>
                        <div class="form-group">
                                <div class="row">
                                <div class="col-md-3 col-form-label text-md-left">
                                <strong>{{Form::label('addedParts','Parts Added')}}  :</strong>
                                </div>
                                <div class="col-md-2 col-form-label text-md-left">
                                {{Form::label('addedParts',$bill->addedParts)}}
                                </div>
                                <div class="col-md-7 col-form-label text-md-left">
    
                                      </div>
                              </div>
                              </div>
                              <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-3 col-form-label text-md-left">
                                    <strong>{{Form::label('stockQty','Quantity')}}  :</strong>
                                    </div>
                                    <div class="col-md-2 col-form-label text-md-left">
                                    {{Form::label('stockQty',$bill->stockQty)}}
                                    </div>
                                    <div class="col-md-2 col-form-label text-md-left">
                                          <strong>{{Form::label('price2','Price')}}  :</strong>
                                          </div>
                                          <div class="col-md-2 col-form-label text-md-left">
                                          {{Form::label('price2',$bill->stockQty)}}
                                          </div>
                                  </div>
                                  </div>
                              <div class="form-group">
                                    <div class="row">
                                            <div class="col-md-5">
                                                    
                                                    </div>
                                    <div class="col-md-2 col-form-label text-md-left">
                                          <strong>{{Form::label('discount','Discount')}}  :</strong>
                                          </div>
                                          <div class="col-md-2 col-form-label text-md-left">
                                          {{Form::label('discount',$bill->serviceCharge*0.05)}}
                                          </div>
                                  </div>
                                  </div>
                                  <div class="form-group">
                                        <div class="row">
                                                <div class="col-md-5 ">
                                                       
                                                        </div>
                                        <div class="col-md-2 col-form-label text-md-left">
                                              <strong>{{Form::label('tax','Tax')}}  :</strong>
                                              </div>
                                              <div class="col-md-2 col-form-label text-md-left">
                                              {{Form::label('tax',$bill->serviceCharge*0.025)}}
                                              </div>
                                      </div>
                                      </div>
                                  <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-5 ">
                                              
                                              </div>
                                              <div class="col-md-4 col-form-label text-md-left">
                                              **********************************************
                                              </div>
                                      </div>
                                      </div>
                                  <div class="form-group">
                                        <div class="row">
                                                <div class="col-md-5 ">
                                                        
                                                        </div>
                                        <div class="col-md-2 col-form-label text-md-left">
                                              <strong>{{Form::label('total','Total Charges')}}  :</strong>
                                              </div>
                                              <div class="col-md-2 col-form-label text-md-left">
                                              {{Form::label('total',$bill->serviceCharge+$bill->stockCharge+($bill->serviceCharge*0.025)-($bill->serviceCharge*0.05))}}
                                              </div>
                                      </div>
                                      </div>
                                      <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-5 ">
                                                  
                                                  </div>
                                                  <div class="col-md-4 col-form-label text-md-left">
                                                  **********************************************
                                                  </div>
                                          </div>
                                          </div>
                                          <div class="form-group">
                                                <div class="row">
                                                <div class="col-md-5 col-form-label text-md-right">
                                                      
                                                      </div>
                                                      <div class="col-md-4 col-form-label text-md-left">
                                                      **********************************************
                                                      </div>
                                              </div>
                                              </div>
             
              </div>
              <div class="form-group">
                    <div class="row">
                    <div class="col-md-3 ">
                          </div>
                          <div class="col-md-3 col-form-label text-md-center">
                              <strong>Thank You  !!!</strong><br><br>
                                <address>
                                        No.210/5 <br>
                                        Weerangala South<br>
                                        Yakkala 
                                    </address>
                          </div>
                          <div class="col-md-3 ">
                            </div>
                  </div>
                  </div>
              
      {!! Form::close() !!}
  </div>
</div>  
@endsection