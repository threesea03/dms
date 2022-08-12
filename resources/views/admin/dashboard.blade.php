<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
            crossorigin="anonymous"> --}}
            <script src="https://cdn.tailwindcss.com"></script>
</head>
<body> 

    
    {{-- <div class="d-flex h-100 w-100 flex-row px-3">
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
            
             {{-- <div class="container">  
                <div class="col-xl-12 col-md-6 mb-4">
                     <div class="boarder h-100 py-2"> 
                        <div class="row no-gutters align-items-center" style="background-color: rgba(30, 134, 30, 0.74)"> 
                            <x-widget-counter header="Outgoing" count="32"></x-widget-counter>
                        </div>
                    </div>
                </div>
            </div>
        
            {{-- <div class="container">  
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="boarder h-100 py-2">
                        <div class="row no-gutters align-items-center" style="background-color: rgba(168, 31, 31, 0.767)"> 
                            <x-widget-counter header="Pending" count="10"></x-widget-counter>
                        </div>
                    </div>
                </div>
            </div>
        
             {{-- <div class="container">  
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="boarder h-90 py-2">
                        <div class="row no-gutters align-items-center" style="background-color: rgba(184, 184, 48, 0.795)"> 
                            <x-widget-counter header="Done" count="55"></x-widget-counter>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  --}}

    {{-- <div class="d-flex flex-row mb-3">
        <div class="p-2">
            <div class="d-flex flex-row mb-3">
                <div class="container" style="margin-top:20px">
                    <div class="col-xl-12 col-md-6 mb-4">
                        <div class="boarder h-100 py-2">
                            <div class="row no-gutters align-items-center" style="background-color: rgba(197, 139, 31, 0.822)"> 
                                <x-widget-counter header="Total Documents" count="190"></x-widget-counter>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          
        <div class="p-2">
            
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="boarder h-100 py-2"> 
                        <div class="row no-gutters align-items-center" style="background-color: rgba(29, 29, 168, 0.74); margin-left:40px"> 
                            <x-widget-counter header="Incoming" count="90"></x-widget-counter>
                        </div>
                    </div>
                </div>
            
        
            </div>
        </div>
        <div class="p-2">
            <div class="d-flex flex-row mb-3">
                <div class="col-xl-12 col-md-6 mb-12">
                     <div class="boarder h-100 py-2"> 
                        <div class="row no-gutters align-items-center" style="background-color: rgba(30, 134, 30, 0.74); margin-left:40px"> 
                            <x-widget-counter header="Outgoing" count="32"></x-widget-counter>
                        </div>
                    </div>
                </div>
            </div>
        
            </div>
        </div>
    </div> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
            crossorigin="anonymous">
    </script> --}}

    <div class="flex flex-col h-screen w-screen">
        <div class="flex flex-row h-24 justify-between px-3 items-center" style="background-color:#365880">
            <span class="text-2xl font-bold font-family: Verdana text-white">Document Management System</span>
        </div>
        <div class="flex flex-row h-16 justify-between items-center px-3">
            <div class="">
                <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
                <a class="nav-link active" aria-current="page" style="margin-left:10px" href="{{ route('incoming.index') }}">Incoming</a>
                <a class="nav-link active" aria-current="page" style="margin-left:10px" href="{{ route('outgoing.index') }}">Outgoing</a>
                <a href="{{ route('outgoing.index') }}"></a>
            </div>
            {{-- <div class="flex flex-row">
                <span class="text-lg fon-bold">Manage</span>
            </div> --}}

            <!-- component -->
<!-- This is an example component -->
<div class="max-w-lg mx-auto" style="margin-left:990px">
    
    <button class="text-black font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" 
            type="button" data-dropdown-toggle="dropdown">Manage<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" 
            xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

    <!-- Dropdown menu -->
    <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
        <ul class="py-1" aria-labelledby="dropdown">
        <li>
            <a href="{{ route('outgoing.userprofile') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Users</a>
        </li>
        <li>
            <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Accounts</a>
        </li>
        <li>
            <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Logs</a>
        </li>
        <li>
            <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Sign out</a>
        </li>
        </ul>
    </div>
    
</div>

<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
 
            {{-- <li class="nav-item dropdown" style="margin-left:990px"> 
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                data-bs-toggle="dropdown" aria-expanded="false"> Manage </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="right:0; left:auto">
                  <li><a class="dropdown-item" href="{{ route('outgoing.userprofile') }}">Profile</a></li>
                  <li><a class="dropdown-item" href="#">Accounts</a></li>
                  <li><a class="dropdown-item" href="#">Logs</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{ route('outgoing.index') }}">Log out</a></li>
                </ul>
              </li> --}}
              
        </div>
        <div class="flex flex-col h-full w-full items-center" style="margin-top:130px">
            <div class="grid grid-cols-5 gap-3 p-3 text-white">
                <div class="col-span-2 row-span-2 rounded p-5" style="background-color: #365880"> 
                    <x-big-widget-counter header="Total Documents" count="{{ $total_count }}">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" class="h-10 w-10 text-white" 
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><path fill="currentColor" fill-rule="evenodd" 
                            d="M0 0h48v48H0V0Zm29 5H16a2 2 0 0 0-2 2v30a2 2 0 0 0 2 2h20a2 2 0 0 0 2-2V14l-9-9Zm0 3l6 6h-5a1 1 0 0 1-1-1V8Zm3.707 14.707a1 1 0 0 0-1.414-1.414L24 28.586l-3.293-3.293a1 1 0 0 0-1.414 1.414L24 31.414l8.707-8.707ZM12 11h-2v27a5 5 0 0 0 5 5h19v-2H15a3 3 0 0 1-3-3V11Z" clip-rule="evenodd"/>
                        </svg>
                    </x-big-widget-counter>
                </div>
                <div class="h-full w-full rounded p-5" style="background-color:rgba(30, 134, 30, 0.74)">
                    <x-widget-counter header="Incoming" count="{{ $incoming_count }}">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" class="h-8 w-8 text-white" 
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" 
                                d="m222 158.4l-46.9-20a15.6 15.6 0 0 0-15.1 1.3l-25.1 16.7a76.5 76.5 0 0 1-35.2-35L116.3 96a15.9 15.9 0 0 0 1.4-15.1L97.6 34a16.3 16.3 0 0 0-16.7-9.6A56.2 56.2 0 0 0 32 80c0 79.4 64.6 144 144 144a56.2 56.2 0 0 0 55.6-48.9a16.3 16.3 0 0 0-9.6-16.7ZM176 208A128.1 128.1 0 0 1 48 80a40 40 0 0 1 34.9-39.7L103 87.2l-16.7 25.4a16 16 0 0 0-1 15.7a92.5 92.5 0 0 0 42.8 42.6a16 16 0 0 0 15.7-1.1l25-16.7l46.9 20A40 40 0 0 1 176 208ZM152 96V56a8 8 0 0 1 16 0v20.7l34.3-34.4a8.1 8.1 0 0 1 11.4 11.4L179.3 88H200a8 8 0 0 1 0 16h-42.3l-.4-.2h-.4l-.3-.2h-.4l-.3-.2l-.3-.2l-.3-.3l-.4-.2l-.4-.4h-.2a.3.3 0 0 0-.1-.2c-.1-.2-.3-.3-.4-.4a.8.8 0 0 1-.2-.4l-.2-.3l-.3-.3l-.2-.3c0-.2-.1-.3-.1-.4l-.2-.3c0-.2-.1-.3-.1-.4l-.2-.4a.8.8 0 0 0-.1-.4v-.3a.9.9 0 0 1-.1-.5a.4.4 0 0 0-.1-.3Z"/>
                        </svg>
                    </x-widget-counter>
                </div>
                
                <div class="h-full w-full rounded p-5" style="background-color: rgba(197, 139, 31, 0.822)">
                    <x-widget-counter header="Pending" count="{{ $pending_in }}">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" class="h-8 w-8 text-white" 
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" 
                            d="M17 12c-2.76 0-5 2.24-5 5s2.24 5 5 5s5-2.24 5-5s-2.24-5-5-5zm1.65 7.35L16.5 17.2V14h1v2.79l1.85 1.85l-.7.71zM18 3h-3.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H6c-1.1 0-2 .9-2 2v15c0 1.1.9 2 2 2h6.11a6.743 6.743 0 0 1-1.42-2H6V5h2v3h8V5h2v5.08c.71.1 1.38.31 2 .6V5c0-1.1-.9-2-2-2zm-6 2c-.55 0-1-.45-1-1s.45-1 1-1s1 .45 1 1s-.45 1-1 1z"/>
                        </svg>
                    </x-widget-counter>
                </div>
                <div class="h-full w-full rounded p-5" style="background-color: rgba(184, 184, 48, 0.795)">
                    <x-widget-counter header="Done" count="{{ $done_in }}">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" class="h-8 w-8 text-white"
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path fill="currentColor" 
                            d="M688 312v-48c0-4.4-3.6-8-8-8H296c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h384c4.4 0 8-3.6 8-8zm-392 88c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h184c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8H296zm376 116c-119.3 0-216 96.7-216 216s96.7 216 216 216s216-96.7 216-216s-96.7-216-216-216zm107.5 323.5C750.8 868.2 712.6 884 672 884s-78.8-15.8-107.5-44.5C535.8 810.8 520 772.6 520 732s15.8-78.8 44.5-107.5C593.2 595.8 631.4 580 672 580s78.8 15.8 107.5 44.5C808.2 653.2 824 691.4 824 732s-15.8 78.8-44.5 107.5zM761 656h-44.3c-2.6 0-5 1.2-6.5 3.3l-63.5 87.8l-23.1-31.9a7.92 7.92 0 0 0-6.5-3.3H573c-6.5 0-10.3 7.4-6.5 12.7l73.8 102.1c3.2 4.4 9.7 4.4 12.9 0l114.2-158c3.9-5.3.1-12.7-6.4-12.7zM440 852H208V148h560v344c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8V108c0-17.7-14.3-32-32-32H168c-17.7 0-32 14.3-32 32v784c0 17.7 14.3 32 32 32h272c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8z"/>
                        </svg>
                    </x-widget-counter>
                </div>
                <div class="h-full w-full rounded p-5" style="background-color:rgba(168, 31, 31, 0.767) ">
                    <x-widget-counter header="Outgoing" count="{{ $outgoing_count }}">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" class="h-8 w-8 text-white" 
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" 
                                d="m222 158.4l-46.9-20a15.6 15.6 0 0 0-15.1 1.3l-25.1 16.7a76.5 76.5 0 0 1-35.2-35L116.3 96a15.9 15.9 0 0 0 1.4-15.1L97.6 34a16.3 16.3 0 0 0-16.7-9.6A56.2 56.2 0 0 0 32 80c0 79.4 64.6 144 144 144a56.2 56.2 0 0 0 55.6-48.9a16.3 16.3 0 0 0-9.6-16.7ZM176 208A128.1 128.1 0 0 1 48 80a40 40 0 0 1 34.9-39.7L103 87.2l-16.7 25.4a16 16 0 0 0-1 15.7a92.5 92.5 0 0 0 42.8 42.6a16 16 0 0 0 15.7-1.1l25-16.7l46.9 20A40 40 0 0 1 176 208Zm-21.7-106.3a8.1 8.1 0 0 1 0-11.4L188.7 56H168a8 8 0 0 1 0-16h40a8 8 0 0 1 8 8v40a8 8 0 0 1-16 0V67.3l-34.3 34.4a8.2 8.2 0 0 1-11.4 0Z"/>
                        </svg>
                    </x-widget-counter>
                </div>
                <div class="h-full w-full rounded p-5" style="background-color: rgba(2, 121, 121, 0.74)">
                    <x-widget-counter header="Pending" count="{{ $pending_out }}">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" class="h-8 w-8 text-white" 
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" 
                            d="M17 12c-2.76 0-5 2.24-5 5s2.24 5 5 5s5-2.24 5-5s-2.24-5-5-5zm1.65 7.35L16.5 17.2V14h1v2.79l1.85 1.85l-.7.71zM18 3h-3.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H6c-1.1 0-2 .9-2 2v15c0 1.1.9 2 2 2h6.11a6.743 6.743 0 0 1-1.42-2H6V5h2v3h8V5h2v5.08c.71.1 1.38.31 2 .6V5c0-1.1-.9-2-2-2zm-6 2c-.55 0-1-.45-1-1s.45-1 1-1s1 .45 1 1s-.45 1-1 1z"/>
                        </svg>
                    </x-widget-counter>
                </div>
                <div class="h-full w-full rounded p-5" style="background-color: rgba(138, 69, 135, 0.76)">
                    <x-widget-counter header="Done" count="{{ $done_out }}">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" class="h-8 w-8 text-white"
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path fill="currentColor" 
                            d="M688 312v-48c0-4.4-3.6-8-8-8H296c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h384c4.4 0 8-3.6 8-8zm-392 88c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h184c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8H296zm376 116c-119.3 0-216 96.7-216 216s96.7 216 216 216s216-96.7 216-216s-96.7-216-216-216zm107.5 323.5C750.8 868.2 712.6 884 672 884s-78.8-15.8-107.5-44.5C535.8 810.8 520 772.6 520 732s15.8-78.8 44.5-107.5C593.2 595.8 631.4 580 672 580s78.8 15.8 107.5 44.5C808.2 653.2 824 691.4 824 732s-15.8 78.8-44.5 107.5zM761 656h-44.3c-2.6 0-5 1.2-6.5 3.3l-63.5 87.8l-23.1-31.9a7.92 7.92 0 0 0-6.5-3.3H573c-6.5 0-10.3 7.4-6.5 12.7l73.8 102.1c3.2 4.4 9.7 4.4 12.9 0l114.2-158c3.9-5.3.1-12.7-6.4-12.7zM440 852H208V148h560v344c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8V108c0-17.7-14.3-32-32-32H168c-17.7 0-32 14.3-32 32v784c0 17.7 14.3 32 32 32h272c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8z"/>
                        </svg>
                    </x-widget-counter>
                </div>
              </div>
        </div>
    </div>
</body>
</html>