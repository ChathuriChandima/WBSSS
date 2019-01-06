@extends('layouts.log')
<link rel="stylesheet" href="{{asset('my/l.css')}}">
@section('content')

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
                       
                    <td>
                        <a href="editSalary/{{$b->type}}" class="btn" title="Edit" style="background-color:lavender;"><img src="img\icons8_Edit_25px.png" /></a>
                    
                     
                    
                    @endforeach
                </tr>
            
                </table>
            </div>
        @endsection