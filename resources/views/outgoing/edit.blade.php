@extends('outgoing.layout')
@section('content')

<div class="col-md-9" style="margin-left:150px">
  <div class="card" style="margin-top: 20px;">
    <div class="card">
      <div class="card-header">
        <h4 class="text-center"> Edit Information</h4>
      </div>
        <div class="card-body">
          <div id="create-row" class="row justify-content-center align items-center">
           <div id="create-column" class="col-md-6">
             <div id="create-box" class="col-md-12">
      
              @foreach ($errors->all() as $message)
                {{ $message }}
              @endforeach
              <form action="{{ url('outgoing/' .$outgoing->ctrli. '/edit') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method("POST")

                <input type="hidden" name="ctrli" id="ctrli" value="{{$outgoing->ctrli}}" />
                
                <div class="row">
                  <div class="col-md-6">
                    <label>Date</label></br>
                    <input type="text" name="date" id="date" value="{{$outgoing->date}}" class="form-control"></br>
                  </div>
                  <div class="col-md-6">
                    <label>Time</label></br>
                    <input type="text" name="time" id="time" value="{{$outgoing->time}}" class="form-control"></br>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <label>Type of Service</label></br>
                    <input type="text" name="typeofservice" id="typeofservice" value="{{$outgoing->typeofservice}}" class="form-control" /></br>
                  </div>

                  <div class="col-md-6">
                    <label>Office Concerned</label></br> 
                    <input type="text" name="officeconcerned" id="officeconcerned" value="{{$outgoing->officeconcerned}}" class="form-control" /></br>
                  </div>
                </div>
        
                <label>Subject</label></br>
                <input type="text" name="subject" id="subject" value="{{$outgoing->subject}}" class="form-control" /></br>
        
                <label>Name</label></br>
                <input type="text" name="name" id="name" value="{{$outgoing->name}}" class="form-control" /></br>
                
                <div class="row">
                  <div class="col-md-6">
                    <label>Agency</label></br>
                    <input type="text" name="agency" id="agency" value="{{$outgoing->agency}}" class="form-control" /></br>
                  </div>
                
                  <div class="col-md-6"> 
                    <label>Time Received</label></br>
                    <input type="text" name="timereceived" id="timereceived" value="{{$outgoing->timereceived}}" class="form-control" /></br>
                  </div>
                </div>
        
                <label>Files</label></br>
                <input type="file" name="files" id="files" class="form-control"></br>

                <label>Progress Check</label></br> 
                <select id="remarks" name="progresschek" class="form-select">
                    <option selected disabled>Status</option>
                    <option value='Done' {{ $outgoing->progresschek == "Done" ? 'selected': ''}}> Done </option>
                    <option value='Pending' {{ $outgoing->progresschek == "Pending" ? 'selected': ''}}> Pending </option>
                </select>

                {{-- <div class="btn-group" role="group"> --}}
                  {{-- <a href="{{url()->previous()}}" class="btn btn-default" style="background-color: rgba(158, 17, 17, 0.767); 
                          width:110px; font-family: Arial; border-radius:25px; color:white; margin-top:20px; margin-bottom:20px; 
                          margin-left:200px; height:40px">Cancel</a> --}}

                  {{-- <input type="submit" value="Update" class="btn btn-success" style="width:110px; font-family: Arial;  
                              border-radius:25px; color:white; background-color:#D2691E margin-top:20px; margin-bottom:20px; margin-left:30px; height:40px"></br>--}}
                  
                  {{-- <a href="{{url()->previous()}}" class="btn" style="background-color: #84482F; color:white; margin-left:100px;
                          width:110px; font-family: Arial; border-radius:25px; color:white; margin-top:20px; margin-bottom:20px; 
                          margin-left:200px; height:40px">Cancel</a>
                  <input type="submit" name="Update" id="update" class="btn btn-success" style="width:110px; font-family: Arial; 
                              border-radius:25px; color:white; background-color:#D2691E margin-top:20px; margin-bottom:20px; margin-left:30px; height:40px"></br> --}}
                <div class="btn-group" role="group">
                  <a href="{{url('outgoing')}}" class="btn" style="width:110px; font-family: Arial; border-radius:25px; background-color: #3B919B; color:white; margin-top:20px; margin-bottom:20px; margin-left:300px; height:40px;">Cancel</a>
                    <input type="submit" value="Update" class="btn" style="margin-top:20px; margin-bottom:20px; margin-left:10px; width:110px; height:40px; font-family: Arial; border-radius:25px; background-color: #365880; color:white" data-inline:="true"></br>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>
</div>
@stop