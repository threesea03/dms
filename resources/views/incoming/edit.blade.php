@extends('incoming.layout')
@section('content')
 
<div class="col-md-8" style="margin-left:250px">
<div class="card" style="margin-top: 20px; margin-bottom:20px">
  <div class="card-header">
    <h3 class="text-center"> Edit Information</h3>
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
                <input type="file" name="files" id="files" class="form-control"></br>
                <iframe src="{{ asset ($incoming->files) }}" height="60" width="60"></iframe>

                <label>Remarks</label></br>
                <input type="text" name="remarks" id="remarks" value="{{$incoming->remarks}}" class="form-control"></br>


                <input type="submit" value="Update" class="btn btn-success" style="margin-top:20px; margin-bottom:20px; margin-left:440px; width:110px; height:40px; font-family: Arial; border-radius:25px" data-inline:="true"></br>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
@stop