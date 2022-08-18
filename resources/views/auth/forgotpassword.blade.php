<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document Tracking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card" style="margin-top:100px">
                    <div class="card-header">
                        <h5 class="text-center"> Change Password </h5>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <h6> Password must include:</h6>
                            <div class="col-md-12">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12l6 6L20 6"/></svg>
                                Atleast 8 characters
                            </div>
                            <div class="col-md-12">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12l6 6L20 6"/></svg>
                                Atleast one number
                            </div>
                            <div class="col-md-12">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12l6 6L20 6"/></svg>
                                Atleast one uppercase letter
                            </div>
                            <div class="col-md-12">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12l6 6L20 6"/></svg>
                                Atleast one lowercase letter
                            </div>
                            <div class="col-md-12">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12l6 6L20 6"/></svg>
                                Atleast one special character
                            </div> </br>
                        </div>
                        <form action="{{ route('setup.password') }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-10" style="margin-bottom: 20px">
                                    <input type="password" name="password" id="change_password" class="form-control" placeholder="Input a new password"></br>
                                    <span class="text-danger">
                                        @error('password')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-10">
                                    <input type="password" name="password_confirmation" id="newpassword" class="form-control" placeholder="Confirm new password"></br>
                                    <span class="text-danger">
                                        @error('password')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-10" style="margin-top:15px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="sq" class="form-select"> 
                                                <option selected disabled>Choose a security question</option>
                                                <option> Last 3 digits of your phone number? </option>
                                                <option> What's your mother's maden name? </option>
                                                <option> Who's your favorite singer? </option>
                                                <option> What's your least favorite color? </option>
                                                <option> What was your dream as a child? </option>
                                              </select>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="Your answer here."></br>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <button class="btn" type="submit" style="background-color: #3A6289; color:white; margin-left:490px">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>