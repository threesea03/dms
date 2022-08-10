<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body> 

    
    <div class="d-flex h-100 w-100 flex-row px-3">
        <div class="w-25 d-flex flex-row">
            <div class="container" style="margin-top:20px">
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="boarder h-100 py-2">
                        <div class="row no-gutters align-items-center" style="background-color: rgba(197, 139, 31, 0.822)"> 
                            <x-widget-counter header="Total Documents" count="190"></x-widget-counter>
                        </div>
                    </div>
                </div>
            </div>

                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="boarder h-100 py-2"> 
                        <div class="row no-gutters align-items-center" style="background-color: rgba(29, 29, 168, 0.74)"> 
                            <x-widget-counter header="Incoming" count="90"></x-widget-counter>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <x-widget-counter header="Outgoing" count="32"></x-widget-counter>
                            <x-widget-counter header="Pending" count="10"></x-widget-counter>
                            <x-widget-counter header="Done" count="4"></x-widget-counter> --}}
            
            {{-- <div class="container"> --}}
                <div class="col-xl-12 col-md-6 mb-4">
                     <div class="boarder h-100 py-2"> 
                        <div class="row no-gutters align-items-center" style="background-color: rgba(30, 134, 30, 0.74)"> 
                            <x-widget-counter header="Outgoing" count="32"></x-widget-counter>
                        </div>
                    </div>
                </div>
            </div>
        
            {{-- <div class="container"> --}}
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="boarder h-100 py-2">
                        <div class="row no-gutters align-items-center" style="background-color: rgba(168, 31, 31, 0.767)"> 
                            <x-widget-counter header="Pending" count="10"></x-widget-counter>
                        </div>
                    </div>
                </div>
            </div>
        
            {{-- <div class="container"> --}}
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="boarder h-90 py-2">
                        <div class="row no-gutters align-items-center" style="background-color: rgba(184, 184, 48, 0.795)"> 
                            <x-widget-counter header="Done" count="55"></x-widget-counter>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
            crossorigin="anonymous">
    </script>
</body>
</html>