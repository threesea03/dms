@extends('outgoing.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header" style="font-weight:bolder">Show Document</div>

  <div class="card-body">
    <embed src="{{ asset ($outgoing->files) }}" style="height: 100vh; width: 70vw; 
                margin-left:200px; margin-bottom:20px"></hr>
  </div>
</div>