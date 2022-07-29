@extends('outgoing.layout')
@section('content')

<div class="col-md-9" style="margin-left:150px">
  <div class="card" style="margin-top: 20px;">
    <div class="card">
      <div class="card-header" style="font-weight: bolder">Edit Document</div>
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
        
                <label>Date</label></br>
                <input type="text" name="date" id="date" value="{{$outgoing->date}}" class="form-control"></br>
        
                <label>Time</label></br>
                <input type="text" name="time" id="time" value="{{$outgoing->time}}" class="form-control"></br>
       
                <label>Type of Service</label></br>
                <input type="text" name="typeofservice" id="typeofservice" value="{{$outgoing->typeofservice}}" class="form-control" /></br>
        
                <label>Office Concerned</label></br> 
                <input type="text" name="officeconcerned" id="officeconcerned" value="{{$outgoing->officeconcerned}}" class="form-control" /></br>
        
                <label>Subject</label></br>
                <input type="text" name="subject" id="subject" value="{{$outgoing->subject}}" class="form-control" /></br>
        
                <label>Name</label></br>
                <input type="text" name="name" id="name" value="{{$outgoing->name}}" class="form-control" /></br>
        
                <label>Agency</label></br>
                <input type="text" name="agency" id="agency" value="{{$outgoing->agency}}" class="form-control" /></br>
        
                <label>Time Received</label></br>
                <input type="text" name="timereceived" id="timereceived" value="{{$outgoing->timereceived}}" class="form-control" /></br>
        
                <label>Files</label></br>
                <input type="file" name="files" id="files" class="form-control"></br>
                <iframe src="{{ asset ($outgoing->files) }}" height="60" width="60"></iframe>

                <label>Remarks</label></br>
                <select id='remarks' name='remarks' class="form-select">
                  <option selected disabled>Done?</option>
                  <option value='Done'> Done </option>
                </select></br>

                <div class="btn-group" role="group">
                  <a href="{{url()->previous()}}" class="btn btn-default" style="background-color: rgba(158, 17, 17, 0.767); 
                    width:110px; font-family: Arial; border-radius:25px; color:white; margin-top:20px; margin-bottom:20px; 
                    margin-left:200px; height:40px">Cancel</a>

                  <input type="submit" value="Update" class="btn btn-success" style="width:110px; font-family: Arial; 
                    border-radius:25px; color:white; margin-top:20px; margin-bottom:20px; margin-left:30px; height:40px"></br>
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