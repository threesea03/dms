@extends('incoming.layout')
@section('content')
 
<div class="col-md-8" style="margin-left:250px">
<div class="card" style="margin-top: 20px; margin-bottom:20px">
  <div class="card-header">
    <h5 class="text-center"> Edit Information</h5>
  </div>
  <div class="card-body">
    <div id="createblade-row" class="row justify-content-center align-items-center">
        <div id="createblade-column" class="col-md-8">
            <div id="createblade-box" class="col-md-12">

                @foreach ($errors->all() as $message) 
                    {{$message }}  
                @endforeach
                <form action="{{ url('incoming/' .$incoming->ctrli. '/edit') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method("POST")

        <input type="hidden" name="ctrli" id="ctrli" value="{{$incoming->ctrli}}" id="ctrli" />

        <div class="row">
            <div class="col-md-3">
                <label>Ctrl External</label></br>
                <input type="text" name="ctrle" id="ctrle" value="{{$incoming->ctrle}}" class="form-control"></br>
            </div>

            <div class="col-md-5">
                <label>Date</label></br>
                <input type="date" name="date" id="date" value="{{$incoming->date}}" class="form-control"></br>
            </div>

            <div class="col-md-4">
                <label>Time</label></br>
                <input type="time" name="time" id="time" value="{{$incoming->time}}" class="form-control"></br>
            </div>
        </div>

        <div class="row"> 
            <div class="col-md-7">
                <label>Reciever</label></br>
                <input type="text" name="reciever" id="reciever" value="{{$incoming->reciever}}" class="form-control"></br>
            </div>

            <div class="col-md-5">
                <label>Type of Service</label></br>
                <input type="text" name="typeofservice" id="typeofservice" value="{{$incoming->typeofservice}}" class="form-control"></br>
            </div>
        </div>

              <label>Subject</label></br>
              <input type="text" name="subject" id="subject" value="{{$incoming->subject}}" class="form-control"></br>

        <div class="row"> 
            <div class="col-md-5">
                <label>Office Concerned</label></br>
                <input type="text" name="officeconcerned" id="officeconcerned" value="{{$incoming->officeconcerned}}" class="form-control"></br>
            </div>

            <div class="col-md-7">
                <label>Endorsed To</label></br>
                <input type="text" name="endorsedto" id="endorsedto" value="{{$incoming->endorsedto}}" class="form-control"></br>
            </div>
        </div>

                <label>Files</label></br>
                <div class="row">
                    <div class="col-md-3">
                        <embed src="{{ asset ($incoming->files) }}" style="height: 40px; width: 60px; margin-bottom:20px; margin-left:30px"></br>
                    </div>
                    <div class="col-md-7">
                        <input type="file" name="files" id="files" value="{{ $incoming->files }}" class="form-control"></br>
                    </div>
                </div>

                <label>Progress Check</label></br> 
                <select id="remarks" name="remarks" class="form-select">
                    <option selected disabled>Status</option>
                    <option value='Done' {{ $incoming->remarks == "Done" ? 'selected': ''}}> Done </option>
                    <option value='Pending' {{ $incoming->remarks == "Pending" ? 'selected': ''}}> Pending </option>
                </select> 
                    
            <div class="btn-group" role="group">
                <a href="{{url('incoming')}}" class="btn" style="width:110px; font-family: Arial; border-radius:25px; background-color: #E6E6FA; margin-top:20px; margin-bottom:20px; margin-left:400px; height:40px;">Cancel</a>
                <input type="submit" value="Update" class="btn" style="margin-top:20px; margin-bottom:20px; margin-left:10px; width:110px; height:40px; font-family: Arial; border-radius:25px; background-color: #6A5ACD; color:white" data-inline:="true"></br>
            </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
@stop