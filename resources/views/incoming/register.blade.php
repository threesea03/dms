@extends('incoming.layout')
@section('content')

<div class="col-md-8" style="margin-left:250px">
    <div class="card" style="margin-top: 20px; margin-bottom:20px">
        <div class="card-header">
            <h4 class="text-center"> Register </h4>
        </div>
        <div class="card-body">
            <div id="createblade-row" class="row justify-content-center align-items-center">
                <div id="createblade-column" class="col-md-9">
                    <div id="createblade-box" class="col-md-12">
                        <form action="{{ url('register') }}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                          @if (Session::has('success'))
                          <div class="alert alert-success"> {{Session::get('success')}}</div>
                          @endif
                          @if(Session::has('message'))
                            <div class="alert alert-success">{{Session::get('message') }}.</div>
                          @endif
                          @if (Session::has('fail'))
                          <div class="alert alert-danger"> {{Session::get('fail')}}</div>
                          @endif
                          
                          @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                          @endif

                          <div class="row">
                            <div class="col-md-4">
                                <label>First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required></br>
                                <span class="text-danger">
                                  @error('name')
                                  {{ $message }}
                                  @enderror
                              </span>
                            </div>

                            <div class="col-md-4">
                              <label>Middle Name</label>
                              <input type="text" name="middle_name" id="middle_name" class="form-control" required></br>
                              <span class="text-danger">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </span>
                            </div>

                          <div class="col-md-4">
                              <label>Last Name</label>
                              <input type="text" name="last_name" id="last_name" class="form-control" required></br>
                              <span class="text-danger">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </span>
                            </div>
                          </div>  

                          <div class="row">
                            <div class="col-md-7">
                                <label>Address</label>
                                <input type="text" name="address" id="address" class="form-control" required></br>
                                <span class="text-danger">
                                  @error('name')
                                  {{ $message }}
                                  @enderror
                              </span>
                            </div>

                            <div class="col-md-5">
                                <label>Phone Number</label>
                                <input type="text" name="phonenumber" id="phonenumber" class="form-control" required></br>
                                <span class="text-danger">
                                  @error('name')
                                  {{ $message }}
                                  @enderror
                              </span>
                            </div>
                          </div>
                            
                          <div class="row">
                            <div class="col-md-5">
                                <label>Username</label>
                                <input type="text" name="username" id="username" class="form-control" required></br>
                                <span class="text-danger">
                                  @error('name')
                                  {{ $message }}
                                  @enderror
                              </span>
                            </div>

                              <div class="col-md-7">
                                  <label>Email</label>
                                  <input type="email" name="email" id="email" class="form-control" required></br>
                                  <span class="text-danger">
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                </span>
                              </div>
                          </div>
                            

                                @if(Auth::id() != 1)
                                  <div class="col-md-12">
                                      <label>Password</label>
                                      <input type="password" name="password" id="password" class="form-control" required></br>
                                      <span class="text-danger">
                                        @error('password')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                  </div>
    
                                  <div class="col-md-12">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password" class="form-control" required></br>
                                  </div>
                                @endif

                                <div class="">
                                  <label> Position </label>
                                  <input type="text" name="position" id="" class="form-control">
                                </div>

                                {{-- <div class="row">
                                  <div class="col-md-6"> </br>
                                      <select name="sq" class="form-select"> 
                                        <option selected disabled>Choose a security question</option>
                                        <option> Last 3 digits of your phone number? </option>
                                        <option> What's your mother's maden name? </option>
                                        <option> Who's your favorite singer? </option>
                                        <option> What's your least favorite color? </option>
                                        <option> What was your dream as a child? </option>
                                      </select>
                                  </div>
                                  <div class="col-md-6"></br>
                                    <input type="text" class="form-control" placeholder="Your answer here.">
                                  </div>
                                </div>   --}}

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