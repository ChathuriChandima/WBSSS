@extends('layouts.log')
<link rel="stylesheet" href="{{asset('my/s.css')}}">
@section('content')
<div class="container">
    <div class="title m-b-md">
      {{ strtoupper($message)}} only Page!
    </div>
</div>
@endsection
