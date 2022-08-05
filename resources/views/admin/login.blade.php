<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:45px">
            <div class="col-md-4 col-md-offset-4" style="margin-left:350px">
                <h4> Login </h4><hr>
                <form action="{{ route('outgoing') }}" method="post">
                    
                     @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    @csrf

                    <div class="form">
                        <label>username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                        <span class="text-danger">@error ('username'){{ $message }} @enderror </span>
                    </div>
                    <div class="form">
                        <label>password</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                        <span class="text-danger">@error ('password'){{ $message }} @enderror </span>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-sm" style="background-color:#D2691E; color:white; 
                    width:26vw; height:3vw; font-size:15px"> Sign In </button>
                    <br>
                    <a href=""></a>
            </div>
        </div>
    </div>
    
</body>
</html>