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
            <form action="{{ route('incoming.remark.add', ['id' => $incoming->ctrli]) }}" method="post">
              {!! csrf_field() !!}
                  <input type="text" name="body" id="remarks" style="margin-top: 4px" class="form-control" placeholder=""></br>
                  <a href="{{url('incoming')}}" 
                    class="btn" 
                    style="background-color: #E6E6FA; margin-left:150px">
                    Cancel
                  </a>
                  <input type="submit" name="Update" id="update" class="btn" style="background-color: #6A5ACD; color:white">
            </form>
          </div>
            <p class="text-center" style="font-weight:bold; font-size:20px; padding-top:20px">- - PROGRESS CHECK - -</p>
            <p style="font-weight:bold"> Subject: </p>
            <p> {{ $incoming->subject }} </p>
            <p style="font-weight: bold">Status: </p>
            <p> {{ $incoming->remarks }}</p>
            <p style="font-weight: bold">Remarks:</p>
            @foreach ($incoming->remarksList as $remark)
              <div class="d-flex flex-row">
                <div class="d-flex flex-column">
                  <span class="fs-6 fw-3" style="font-weight:bold"> {{ $remark->header }}</span>
                  <span class="">{{ $remark->body }}</span>
                </div>
              </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

