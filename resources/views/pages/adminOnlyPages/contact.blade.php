@extends('layouts.log')

<link rel="stylesheet" href="{{asset('my/v.css')}}">
@section('content')

<div class="container">
  <div class="container mt-3">
    <!-- List of new contacts  -->
    @if (sizeof($new))
      <h4>New Messages</h4>
      <br />
      @foreach($new as $contact)
        <div>
          <h3>{{$contact->subject}}</h3>
          <br />
          <p>{{$contact->message}}</p>
          <a href="reply_contact_form/{{$contact->id}}">Reply</a>
        </div>
        <br />
      @endforeach
    @endif

    @if (sizeof($responded))
      <h4>Responded Messages</h4>
      <br />
      @foreach($responded as $contact)
        <div>
          <h3>{{$contact->subject}}</h3>
          <br />
          <p>{{$contact->message}}</p>
          <a href="reply_contact_form/{{$contact->id}}">Reply</a>
        </div>
        <br />
      @endforeach
    @endif

  </div>
</div>
@endsection
