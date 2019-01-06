@extends('layouts.log')

<link rel="stylesheet" href="{{asset('my/v.css')}}">
@section('content')

<div class="container">
  <div class="container mt-3">
    <!-- List of new contacts  -->
    @if (sizeof($new))
    <div class="col-md-6 float-left">
      <h4>New Messages</h4>
      <br />
      @foreach($new as $contact)
        <div class="card bg-light">
            <div class="card-body">
          <h3>{{$contact->subject}}</h3>
          <br />
          <p>{{$contact->message}}</p>
          <a href="reply_contact_form/{{$contact->id}}">Reply</a>
        </div>
        </div>
        <br />
      @endforeach
    </div>
    @endif

    @if (sizeof($responded))
    <div class="col-md-6 float-right">
      <h4>Responded Messages</h4>
      <br />
      @foreach($responded as $contact)
        <div class="card bg-light">
            <div class="card-body">
          <h3>{{$contact->subject}}</h3>
          <br />
          <p>{{$contact->message}}</p>
          <a href="reply_contact_form/{{$contact->id}}">Reply</a>
        </div>
        </div>
        <br />
      @endforeach
    </div>
    @endif

  </div>
</div>
@endsection
