{{-- @extends('outgoing.generate')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div clas="row">
            <div class="col-md-4" style="margin-top:20px; margin-left:350px">
                <h3> Login </h3><hr>
                <form action="" method="get">
                    <div class="form-group">
                        <label>username</label>
                        <input type="text" class="form-control" name="username">
                        <span class="text-danger">@error ('username'){{ $message }} @enderror</span>
                    </div>
                    
                    <div class="form-group">
                        <label>password</label>
                        <input type="text" class="form-control" name="password">
                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                    </div><br>
                        <button type="submit" class="btn btn-sm" style="background-color:#D2691E; color:white; 
                                    width:27vw; height:3vw; font-size:15px"> Sign In </button> 
                </form>
            </div>	
        </div>
    </div>
</body>
</html>
@endsection --}}