@extends('outgoing.layout')
@section('content')
 
<div class="col-md-9" style="margin-left:150px">
  <div class="card" style="margin-top: 20px;">
    <div class="card">
      <div class="card-header">
        <h4 class="text-center"> Add Document </h4>
    </div>
        <div class="card-body">
          <div id="create-row" class="row justify-content-center align items-center">
            <div id="create-column" class="col-md-6">
              <div id="create-box" class="col-md-12">
      
                <form action="{{ url('outgoing') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <div class="row">
                  <div class="col-md-6">
                    <label>Date</label></br>
                    <input type="date" name="date" id="date" class="form-control" required></br>
                  </div>
                  <div class="col-md-6">
                    <label>Time</label></br>
                    <input type="time" name="time" id="time" class="form-control" required></br>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="col-md-12">
                      <label>Type of Service</label></br>
                      <input type="text" name="typeofservice" id="typeofservice" class="form-control" required></br>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="col-md-12">
                      <label>Office Concerned</label></br>
                      <input type="text" name="officeconcerned" id="officeconcerned" class="form-control" required></br>
                    </div>
                  </div>
                </div>

                  <div class="col-md-12">
                    <label>Subject</label></br>
                    <input type="text" name="subject" id="subject" class="form-control" required></br>
                  </div>

                  <div class="col-md-12">
                    <label>Name</label></br>
                    <input type="text" name="name" id="name" class="form-control" required></br>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-12">
                        <label>Agency</label></br>
                        <input type="text" name="agency" id="agency" class="form-control" required></br>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="col-md-12">
                        <label>Time Received</label></br>
                        <input type="time" name="timereceived" id="timereceived" class="form-control" required></br>
                      </div>
                    </div>

                  </div>

                  <div class="col-md-12">
                    <label>Files</label></br>
                    <input type="file" name="files" id="files" class="form-control" required></br>
                  </div>

                  <div class="row">
                    <label> Status </label></br>
                     <select id="remarks" name="progresschek" class="form-select" required>
                        <option selected disabled>Select Status</option>
                        <option> Pending </option>
                        <option value='Done'> Done </option>
                      </select>
                  </div>
        
                  <div class="btn-group" role="group">
                    <a href="{{url()->previous()}}" class="btn btn-default" style="background-color: #3B919B; 
                            width:110px; font-family: Arial; border-radius:25px; color:white; margin-top:20px; margin-bottom:20px; 
                            margin-left:200px; height:40px;">Cancel</a>
                      
                    <input type="submit" value="Save" class="btn btn-sm" style="margin-top:20px; margin-bottom:20px; 
                                margin-left:20px; width:110px; height:40px; font-family: Arial; border-radius:25px; 
                                background-color:#365880; color:white" data-inline:="true"></br>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop