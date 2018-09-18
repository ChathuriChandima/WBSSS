@extends('layouts.log')
<link rel="stylesheet" href="{{asset('my/s.css')}}">
@section('content')
<div class="container">
    <div class="title m-b-md">
      You cannot access this page! this is for only '{{$role}}'
    </div>
</div>
@endsection
