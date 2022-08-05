<!DOCTYPE html>
<html>
    <head>
        <title>Document Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

      <nav class="navbar navbar-light" style="background-color: #D2691E">
        <div class="col-md-7">
          <div class="container-fluid" style="margin-top:10px; margin-bottom:10px">
            <a class="navbar-brand mb-0" style="font-family: Arial, Helvetica, sans-serif; font-weight:bold; color:white; font-size:23px">
              Document Tracking System 
            </a>
          </div>
        </div>
        <div class="col-md-3" style="margin-right: 20px"> 
          <form action="{{ route('outgoing.index') }}" method="get">
              <div class="input-group">
                  <input type="search" name="search" class="form-control" style="height: 31px; width:60px">
                  <span class="input-group-prepend">
                      <button type="submit" class="btn btn-sm" style="margin-left: 2px;background-color: #84482F; color:white">Search</button>
                  </span>
              </div>
          </form> 
      </div>
      </nav>


      <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
        <div class="container-fluid">
          {{-- <a class="navbar-brand" style="font-family: Arial, Helvetica, sans-serif; font-weight:bold;"> 
            Document Tracking System 
          </a> --}}
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Incoming</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Outgoing</a>
                <a href="{{ route('outgoing.index') }}"></a>
              </li>
              <li class="nav-item dropdown" style="margin-left:1010px"> 
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Menu
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="right:0; left:auto">
                  <li><a class="dropdown-item" href="{{ route('outgoing.userprofile') }}">User</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Log out</a></li>
                </ul>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>

            <body>
                <div class="container">
                    @yield('content')
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
                        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
                        crossorigin="anonymous"></script>
            </body>
</html>