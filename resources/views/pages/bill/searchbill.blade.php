@extends('layouts.log')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <a href="/bills" class="btn btn-info float-left" style="margin-left:300px;"> Back</a>
        <form action="/searchbill" method="POST" role="search" style="margin-left:400px; margin-right:150px;">
          {{ csrf_field() }}
          <div class="input-group">
            <input type="text" class="form-control" name="q" placeholder="Search....">
            <span class="input-group-btn" >
                <button type="submit" class="btn btn-default">
                  <span><img src="/img/Search1.png" /></span>
                </button>
            </span>
          </div>
        </form>
        </div>
    </div>