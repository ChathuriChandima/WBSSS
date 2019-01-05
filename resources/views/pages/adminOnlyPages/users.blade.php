@extends('layouts.log')
@section('content')
<h1>Select the User Category</h1>
<hr>
<a href="/customers" class="btn btn-info float-left" style="height:300px; width:300px; margin-left:200px; margin-top:100px;"><img src="img\user_add.png" style="height:250px; width:250px;" /><p style="text-align:end; font-size:larger; color:black; margin-right:100px;">Customers</p></a>
<a href="/staff" class="btn btn-info float-right" style="height:300px; width:300px; margin-right:200px; margin-top:100px;"><img src="img\staff1.png" style="height:250px; width:250px;" /><p style="text-align:end; font-size:larger; color:black; margin-right:200px;">Staff</p></a>
@endsection