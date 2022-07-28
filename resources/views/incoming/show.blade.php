@extends('incoming.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Ctrl External : {{ $incoming->ctrle }}</h5>
        <p class="card-text">Date : {{ $incoming->date }}</p>
        <p class="card-text">Time : {{ $incoming->time }}</p>
  </div>
       
    </hr>
  
  </div>
</div>