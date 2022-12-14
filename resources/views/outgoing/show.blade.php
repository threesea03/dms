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
        <embed src="{{ asset ($outgoing->files) }}" style="height: 100vh; width: 70vw; margin-bottom:20px; margin-left:30px" type="application/pdf" id="toPrint">
        </hr>
      </div>


      <div class="col-md-3">
         <div class="container" style="margin-left: 230px"> 
          <div class="col-md-12">
            <label style="padding-top: 20px">Remarks:</label> 
            <form action="{{ route('outgoing.remark.add', ['id' => $outgoing->ctrli]) }}" method="post">
              {!! csrf_field() !!}
              <input type="text" name="body" id="remarks" style="margin-top: 4px" class="form-control" placeholder=""></br>
              <a href="{{url('outgoing')}}" 
                class="btn" 
                style="background-color: #3B919B; color:white; margin-left:150px">
                Back
              </a>
              <input type="submit" name="Update" id="update" class="btn" style="background-color: #3A6289; color:white">
            </form>
          </div>
          <p class="text-center" style="font-weight:bold; font-size:20px; padding-top:20px">- - PROGRESS CHECK - -</p>
            <p style="font-weight:bold"> Subject: </p>
            <p> {{ $outgoing->subject }} </p>
            <p style="font-weight: bold">Status: </p>
            <p> {{ $outgoing->progresschek }}</p>
            <p style="font-weight: bold">Remarks:</p>
            @foreach ($outgoing->remarksList as $remark)
                <div class="d-flex flex-row">
                  <div class="d-flex flex-column">
                    <span class="fs-6 fw-3" style="font-weight:bold">{{ $remark->created_at->tz('Asia/Manila')->format('Y, M d | h:i') }}</span>
                    {{-- <span class="fs-6 fw-3" style="font-weight:bold"> {{ $remark->header }} | {{ $remark->created_at->tz('Asia/Manila')->format('h:i') }}</span> --}}
                    <span class="">{{ $remark->body }}</span>
                  </div>
                </div>
              @endforeach
            </div>
        </div>
      </div>

      <script>
        $("#printPDF").click(function(){
          $("#toPrint").print();
        });
      </script>
    </div>
  </div>
</div>