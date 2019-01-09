@extends('layouts.log')
@section('content')
<style>
.zoom1 {
  padding: 0px;
  background-color: green;
  transition: transform .2s; /* Animation */

  margin: 0 auto;
}

.zoom1:hover {
    
  
  
  transform:translate(150px, 100px) scale(1.75) ;
  z-index: 1;
}
.zoom2 {
  padding: 0px;
  background-color: green;
  transition: transform .2s; /* Animation */

  margin: 0 auto;
}

.zoom2:hover {
    
  
  
  transform:translate(-150px, 100px) scale(1.75) ;
  z-index: 1;
}
</style>
<div class="container">
  <div class="container mt-8">
        <div class="col-md-6 float-left">
            <!--load chart assets-->
            {!! Charts::assets() !!}


            <!--display the vehicles per month bar chart-->
            <div class="zoom1">
            {!! $bar_chart->render() !!}

            </div>
            <!--display the monthly income line chart-->
            <div class="zoom">
            {!! $line_chart->render() !!}
            </div>
        </div>
        <div class="col-md-6 float-right">
        <div class="zoom2">
            <!-- display the monthly expenses line chart-->
            {!! $line_chart2->render() !!}
            </div>
            <div class="zoom2">
            <!-- display the monthly profit line chart-->
            {!! $line_chart3->render() !!}
            </div>
            </div>
    </div>
</div>
@endsection
