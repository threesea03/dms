@extends('incoming.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">
    <h3 class="text-center"> Display File </h3>
  </div>
  <div class="card-body">
   
 
    <div class="card-body">
        <h5 class="card-title">Ctrl External : {{ $incoming->ctrle }}</h5>
        <p class="card-text">Date : {{ $incoming->date }}</p>
        <p class="card-text">Time : {{ $incoming->time }}</p>
    </div>
  
    <embed src="{{ asset ($incoming->files) }}" style="height: 100vh; width: 70vw; margin-left:200px; margin-bottom:20px">
    </hr>
  
  </div>
</div>