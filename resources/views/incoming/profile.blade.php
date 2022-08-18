@extends('incoming.layout')
@section('content')


<body class="bg-light">
    <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mt-5 pt-5">
                <div class="row z-depth-3">
                    <div class="col-sm-4 rounded-left" style="background-color: #365880; color:white">
                        <div class="card-block text-center text-white">
                            <i class="fas fa-user-tie fa-7x mt-5"></i>
                            <h4 class="font-weight-bold mt-4">Baguio City Hall</h4>
                            <p>Management Information and Technology Division (MITD)</p>
                            <i class="far fa-edit fa-2x mb-4"></i>
                        </div>
                    </div>
                    <div class="col-sm-8 rounded-right" style="background-color: #E6E6FA">
                        <h3 class="mt-3 text-center">Information</h3>
                        <hr class="badge-primary mt-0 w-25">
                        <div class="row">
                            <div class="col-md-3">
                                <p style="font-weight:bold"> First Name: </p>
                            </div>
                           <div class="col-md">
                                <p>{{ $user->first_name }} </p>
                           </div>
                        
                        {{-- <div class="row"> --}}
                            <div class="col-md-3">
                                <p style="font-weight:bold"> Middle Name: </p>
                            </div>
                           <div class="col-md">
                                <p>{{ $user->middle_name }} </p>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p style="font-weight:bold"> Last Name: </p>
                            </div>
                           <div class="col-md">
                                <p>{{ $user->last_name }} </p>
                           </div>
                        {{-- </div> --}}
                        {{-- <div class="row"> --}}
                            <div class="col-md-3">
                                <p style="font-weight:bold"> Address: </p>
                            </div>
                           <div class="col-md">
                                <p>{{ $user->address }} </p>
                           </div>
                        {{-- </div> --}}
                        <div class="row"> 
                            <div class="col-md-3">
                                <p style="font-weight:bold"> Phone Number: </p>
                            </div>
                           <div class="col-md">
                                <p>{{ $user->phonenumber }} </p>
                           </div>
                        </div>
                        <form action="{{ route('password.regenerate') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button class="btn" type="submit" style="background-color: #3A6289; color:white; border-radius:10px; width:150px; margin-left:520px">Reset Password</button>
                        </form>
                        @if(isset($password))
                            <label> New Password: {{ $password ? $password : '' }}</label>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@stop