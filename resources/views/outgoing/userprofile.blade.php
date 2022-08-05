@extends('outgoing.layout')
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
                    <div class="col-sm-4 rounded-left" style="background-color: #D2691E">
                        <div class="card-block text-center text-white">
                            <i class="fas fa-user-tie fa-7x mt-5"></i>
                            <h4 class="font-weight-bold mt-4">Cathlean Joy</h4>
                            <p>Computer Engineering</p>
                            <i class="far fa-edit fa-2x mb-4"></i>
                        </div>
                    </div>
                    <div class="col-sm-8 rounded-right" style="background-color: #E6E6FA">
                        <h3 class="mt-3 text-center">Change Password</h3>
                        <hr>
                        <div class="container">
                            <label> Old Password </label>
                            <input type="text" name="oldpasswowrd" id="oldpassword" class="form-control">
                            <br>
                            <label> New Password </label>
                            <input type="text" name="newpassword" id="newpassword" class="form-control">

                            <input type="submit" value="Save" class="btn" style="margin-top:20px; margin-bottom:20px; 
                                margin-left:430px; width:110px; height:40px; font-family: Arial; border-radius:25px; background-color:#D2691E; color:white" 
                                data-inline:="true"></br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@stop