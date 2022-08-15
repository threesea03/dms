<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document Tracking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
        <div class="container" style="padding-top: 100px">
            <div class="row">
                <div class="col-md-6">
                <div>
                    <img
                        style="padding-top:100px; padding-left:200px"
                        src="{{ asset('image/baguioseal.png') }}">
                </div>
                </div>

                <div class="col-md-4 col-md-offset-4" style="margin-top: 100px">
                    <h4> Login </h4>
                    <hr>
                    <form action="{{ route('login') }}" method="POST">
                        @if (Session::has('success'))
                        <div class="alert alert-success"> {{Session::get('success')}}</div>
                        @endif
                        @if (Session::has('fail'))
                        <div class="alert alert-danger"> {{Session::get('fail')}}</div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" placeholder="" name="username" value="{{ old('username') }}">
                            <span class="text-danger">
                                @error('username')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="" name="password">
                            <span class="text-danger">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group" style="margin-top: 20px">
                            <button class="btn btn-block" type="submit" style="background-color: #6A5ACD; color:white">Sign In</button>
                        </div>
                        <div class="form-group" style="margin-top: 20px">
                            <button class="btn btn-block" type="submit" style="background-color: #365880; color:white">Sign In</button>
                            <button type="button" class="btn btn-link">Forgot Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>