<!DOCTYPE html>
<html>
<head>
    <title>DMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

      <!-- As a heading -->
       <nav class="navbar navbar-light" style="background-color: #365880">
        <div class="row">
          <div class="col-md-7">
          <div class="" style="padding-top:3px; padding-bottom:2px; margin-left: 20px">
            <span class="navbar-brand mb-0" style="font-size:30px; font-weight:bold; color:white">
              Document Tracking System
            </span>
          </div>
          </div>
          
          <div class="col-md-3">  
          <form action="{{ route('incoming.index') }}" method="get"> 
            <div class="input-group" style="margin-left: 540px; margin-top:8px">
                <input type="search" name="search" class="form-control" style="height: 31px; width:80px" placeholder="Search record">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-sm" style="margin-left: 2px; background-color:#35919B; color:white">Search</button>
                </span>
            </div>
          </form> 
          </div>
        </div>
      </nav>
  
      <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
        <div class="container-fluid">
           {{-- <a class="navbar-brand" href="#" style="font-family: Arial, Helvetica, sans-serif; font-weight:bold; font-size:25px"> 
          Document Tracking System  
        </a> --}}
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 4px">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item"> 
                <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
              </li>
              {{-- <li class="nav-item">  
                <a class="nav-link active" aria-current="page" href="#">About</a>
              </li>--}}
              <li class="nav-item"> 
                <a class="nav-link active" aria-current="page" href="{{ route('incoming.index') }}">Incoming</a>
              </li>
              <li class="nav-item"> 
                <a class="nav-link active" aria-current="page" href="{{ route('outgoing.index') }}">Outgoing</a>
              </li>
              <li class="nav-item"> 
                <a class="nav-link active" aria-current="page" href="{{ route('incoming.report') }}">Report</a>
              </li>
              {{--<li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>--}}
              {{--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Manage
                </a>
                 <ul class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                  <li><a class="dropdown-item" href="{{ url('manage-accounts') }}">Accounts</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Logs</a></li>
                </ul> 
              </li>--}}

              <li class="nav-item dropdown" style="margin-left: 1070px">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Menu
                </a>
                <ul class="dropdown-menu" style="right:0; left:auto" aria-labelledby="navbarDropdown">
                  {{-- <span style="padding-left: 0.75rem">{{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }}</span> --}}
                  <li><a class="dropdown-item" href="{{ route('incoming.profile') }}">Profile</a></li>
                  @if(Auth::id() == 1)
                    <li><a class="dropdown-item" href="{{ url('manage-accounts') }}">Accounts</a></li>
                  @endif
                  {{-- <li><a class="dropdown-item" href="{{ url('manage-accounts') }}">Accounts</a></li> --}}
                  <li><a class="dropdown-item" href="{{ route('incoming.logs') }}">Logs</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{ url('logout') }}">Log Out</a></li>
                </ul>
              </li>

            </ul>

          </div>
        </div>
      </nav>

      

    <div class="container">
        @yield('content')
    </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>