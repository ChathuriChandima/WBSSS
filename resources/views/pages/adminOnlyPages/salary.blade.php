@extends('layouts.log')
<style>
  input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{
    -webkit-appearance: none;
    margin: 0;
  }
</style>
    <link rel="stylesheet" href="{{asset('my/l.css')}}">

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <a class="btn float-right" href='/paySalary' title="Salary Payments"> <img src="img\aaa.jpg"  /></a>
        </div>
    </div>

@section('content')

    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>Employee Type</th>
                <th>salary</th>                        
                <th width="200px">Action</th>
            </tr>

            @foreach ($salary as $b)
                <tr>
                    <td>{{$b->type}}</td>
                    <td>{{$b->salary}}</td>   
                    <td><a href="editSalary/{{$b->type}}" class="btn" title="Edit" style="background-color:lavender;"><img src="img\icons8_Edit_25px.png" /></a></td> 
                </tr>
        @endforeach
        </table>
    </div>
@endsection