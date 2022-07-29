@extends('incoming.generate')
@section('content')
 
<div class="col-md-8" style="margin-left:250px">
    <div class="card" style="margin-top: 20px; margin-bottom:20px">
        <div class="card-header">
            <h2 class="text-center"> Add New Document </h2>
        </div>
        <div class="card-body">
            <div id="createblade-row" class="row justify-content-center align-items-center">
                <div id="createblade-column" class="col-md-8">
                    <div id="createblade-box" class="col-md-12">
                        <form action="{{ url('incoming') }}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
        
                          <div class="row">
                              <div class="col-md-3">
                                  <label>Ctrl External</label>
                                  <input type="text" name="ctrle" id="ctrle" class="form-control">
                              </div>

                              <div class="col-md-5">
                                  <label>Date</label>
                                  <input type="date" name="date" id="date" class="form-control" required>
                              </div>

                              <div class="col-md-4">
                                  <label>Time</label>
                                  <input type="time" name="time" id="time" class="form-control" required></br>
                              </div>
                          </div>

                          <div class="row"> 
                              <div class="col-md-7">
                                  <label>Reciever</label></br>
                                  <input type="text" name="reciever" id="reciever" class="form-control" required></br>
                              </div>

                              <div class="col-md-5">
                                  <label>Type of Service</label></br>
                                  <input type="text" name="typeofservice" id="typeofservice" class="form-control" required></br>
                              </div>
                          </div>

                                  <label>Subject</label></br>
                                  <input type="text" name="subject" id="subject" class="form-control" required></br>

                          <div class="row"> 
                              <div class="col-md-5">
                                  <label>Office Concerned</label></br>
                                  <input type="text" name="officeconcerned" id="officeconcerned" class="form-control" required></br>
                              </div>

                              <div class="col-md-7">
                                  <label>Endorsed To</label></br>
                                  <input type="text" name="endorsedto" id="endorsedto" class="form-control" required></br>
                              </div>
                          </div>
        
                                  <label>Files</label></br>
                                  <input type="file" name="files" id="files" class="form-control"></br>
        
                                  <label>Remarks</label></br>
                                  <input type="text" name="remarks" id="remarks" class="form-control" required></br>

                              <div class="btn-group" role="group">
                                  <a href="{{url()->previous()}}" class="btn btn-default" style="background-color: gray; width:110px; font-family: Arial; border-radius:25px; color:white; margin-top:20px; margin-bottom:20px; margin-left:400px; height:40px;">Cancel</a>
                                  <input type="submit" value="Save" class="btn btn-success" style="margin-top:20px; margin-bottom:20px; margin-left:10px; width:110px; height:40px; font-family: Arial; border-radius:25px" data-inline:="true"></br>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop