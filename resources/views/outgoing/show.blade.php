@extends('outgoing.generate')
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
        <embed src="{{ asset ($outgoing->files) }}" style="height: 100vh; width: 70vw; margin-bottom:20px; margin-left:30px">
        </hr>
      </div>


      <div class="col-md-3">
         <div class="container" style="margin-left: 230px"> 
          <div class="col-md-12">
            <label style="padding-top: 20px">Remarks:</label> 
            <form action="{{ route('outgoing.remark.add', ['id' => $outgoing->ctrli]) }}" method="post">
              {!! csrf_field() !!}
              <input type="text" name="body" id="remarks" style="margin-top: 4px" class="form-control" placeholder=""></br>
              <input type="submit" name="Update" id="update" class="btn" style="background-color: #D2691E; 
                          color:white; border-radius: 10px; margin-left:183px">
            </form>
          </div>
            <p style="font-weight:bold; padding-top:30px"> Title: {{ $outgoing->subject }} </p>
            <p style="font-weight:bold; font-size:20px"> PROGRESS CHECK </p>
            <p style="font-weight:bold">Status: {{ $outgoing->remarks }}</p>
            {{-- <p style="font-weight:bold">Remarks: </p> --}}
            @foreach ($outgoing->remarksList as $remark)
              <div class="d-flex flex-row">
                <div class="d-flex flex-column">
                  {{-- <div class="" style="font-weight:bold"> 
                    <label>Remarks:</label>
                  </div>--}}
                  <span class="fs-6 fw-3" style="font-weight:bold"> Remarks: {{ $remark->header }}</span>
                  <span class="">{{ $remark->body }}</span>
                </div>
              </div>
            @endforeach
            <a href="{{url()->previous()}}" class="btn" style="background-color: #84482F; 
                    color:white; margin-left:176px; border-radius:10px; margin-top: 20px">Go Back</a>
        </div>
      </div>
    </div>
  </div>
</div>