@extends('outgoing.generate')
@section('content')

   <div class="card-body">
      <div class="row">
      
        <div class="col-md-7">
            <embed src="{{ asset ($outgoing->files) }}" style="height: 100vh; width: 70vw; 
                 margin-left:20px"> 
        </div>

         <div class="col-md-3"> 
          <div class="container" style="margin-left:200px">
            <p style="font-weight:bold; font-size: 20px">{{ $outgoing->subject }} </p>
              <p style="font-weight:bold; font-size:18px"> Progress Check </br>
              <p style="font-weight:bold">Status: {{ $outgoing->remarks }} </p></br>
              
              <div class="col-md-3">
                <label> Remarks: </label>
                  <input id="remarks" name="remarks" type="text" class="form-control" ></br>
                  <a href="{{url()->previous()}}" class="btn" style="background-color: #84482F; color:white; margin-left:105px">Cancel</a>
                  <input type="submit" value="Update" class="btn" style="background-color: #D2691E"></br>
              </div>
          </div>
        </div> 
      </div>  
  </div>
@endsection
