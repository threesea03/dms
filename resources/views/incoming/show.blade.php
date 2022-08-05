@extends('incoming.generate')
@section('content')
 
 
<div class="card">
  
  <div class="card-body">

    <div class="form-group col-12 p-0">
      <div>
        @if (Session::has('success'))
        <div class="alert alert-success">
          {{ Session::get('success') }}
        </div> 
        @endif
      </div>
    </div>

    <div class="row">

      <div class="col-md-7">
        <embed src="{{ asset ($incoming->files) }}" style="height: 100vh; width: 70vw; margin-bottom:20px; margin-left:30px">
        </hr>
      </div>


      <div class="col-md-3">
        <div class="container" style="margin-left: 230px">
          <div class="col-md-12">
            <label style="padding-top: 20px">Remarks:</label> 
            <input type="text" name="remarks" id="remarks" style="margin-top: 4px" class="form-control" placeholder=""></br>
            <a href="{{url()->previous()}}" class="btn" style="background-color: #E6E6FA; margin-left:150px">Cancel</a>
            <input type="submit" name="Update" id="update" class="btn" style="background-color: #6A5ACD; color:white">
          </div>
            <p style="font-weight:bold; padding-top:30px"> Title: {{ $incoming->subject }} </p>
            <p style="font-weight:bold; font-size:20px"> PROGRESS CHECK </p>
            <p style="font-weight: bold">Status: {{ $incoming->remarks }}</p>
            <p style="font-weight: bold">Remarks:</p>
        </div>
      </div>
    </div>
  </div>
</div>