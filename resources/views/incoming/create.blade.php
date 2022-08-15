@extends('incoming.layout')
@section('content')
 
<div class="col-md-8" style="margin-left:250px">
    <div class="card" style="margin-top: 20px; margin-bottom:20px">
        <div class="card-header">
            <h5 class="text-center"> Add Document </h5>
        </div>
        <div class="card-body">
            <div id="createblade-row" class="row justify-content-center align-items-center">
                <div id="createblade-column" class="col-md-8">
                    <div id="createblade-box" class="col-md-12">
                        @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        <form action="{{ route('incoming.store') }}" method="post" enctype="multipart/form-data">
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
 
                             <div class="row">
                                <div class="col-md-12">
                                    <label>Progress Check</label>
                                    <select id="remarks" name="remarks_type" class="form-select">
                                        <option selected disabled>Select Status</option>
                                        <option value='Done'> Done </option>
                                        <option value='Pending'> Pending </option>
                                    </select>
                                </div>
                                    
                                    {{-- <div class="col-md-12"> 
                                        <input type="text" name="remarks" id="remarks" style="margin-top: 4px" class="form-control"></br>
                                    </div>--}}
                             </div>
                                  

                              <div class="btn-group" role="group">
                                  <a href="{{url('incoming')}}" class="btn" style="background-color:#35919B; color:white; width:110px; font-family: Arial; border-radius:25px; margin-top:20px; margin-bottom:20px; margin-left:400px; height:40px;">Cancel</a>
                                  <input type="submit" value="Save" class="btn" style="margin-top:20px; margin-bottom:20px; margin-left:10px; width:110px; height:40px; font-family: Arial; border-radius:25px; background-color: #365880; color:white" data-inline:="true"></br>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop