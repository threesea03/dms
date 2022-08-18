@extends('incoming.layout')
@section('content')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<div class="container"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin-top: 20px; margin-bottom:20px">

                    <div class="card-header">
                        <h4 class="text-center">Report Generation</h4>
                    </div>

                    <div class="card-body" id="editor">
                        <form action="{{ route('incoming.report') }}" method="get">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #365880; color:white; margin-top:30px; margin-left:70px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 36 36"><path fill="currentColor" d="M6 13.61h7.61V6H24v8.38h2V6a2 2 0 0 0-2-2H10.87L4 10.87V30a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2H6Zm0-1.92L11.69 6H12v6H6Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M28.32 16.35a1 1 0 0 0-1.41 1.41L30.16 21H18a1 1 0 0 0 0 2h12.19l-3.28 3.28a1 1 0 1 0 1.41 1.41L34 22Z" class="clr-i-outline clr-i-outline-path-2"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                                            Export
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="{{ route('generate.report', ['search' => $values['search'], 'from' => $values['from'], 'to' => $values['to']]) }}">XLSX</a>
                                          <a class="dropdown-item" href="{{ route('generatecsv.report', ['search' => $values['search'], 'from' => $values['from'], 'to' => $values['to']]) }}">CSV</a>
                                          <span class="dropdown-item" id="downloadPDF">PDF</span>
                                        </div>
                                      </div>

                                    {{-- <a href="{{ route('generate.report', ['search' => $values['search'], 'from' => $values['from'], 'to' => $values['to']]) }}" class="btn btn-sm" title="Generate Report" style="background-color: #365880; color:white; margin-top:30px; margin-left:70px">
                                        <i class="fa fa-plus" aria-hidden="true"></i> <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path fill="currentColor" d="M688 312v-48c0-4.4-3.6-8-8-8H296c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h384c4.4 0 8-3.6 8-8zm-392 88c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h184c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8H296zm376 116c-119.3 0-216 96.7-216 216s96.7 216 216 216s216-96.7 216-216s-96.7-216-216-216zm107.5 323.5C750.8 868.2 712.6 884 672 884s-78.8-15.8-107.5-44.5C535.8 810.8 520 772.6 520 732s15.8-78.8 44.5-107.5C593.2 595.8 631.4 580 672 580s78.8 15.8 107.5 44.5C808.2 653.2 824 691.4 824 732s-15.8 78.8-44.5 107.5zM761 656h-44.3c-2.6 0-5 1.2-6.5 3.3l-63.5 87.8l-23.1-31.9a7.92 7.92 0 0 0-6.5-3.3H573c-6.5 0-10.3 7.4-6.5 12.7l73.8 102.1c3.2 4.4 9.7 4.4 12.9 0l114.2-158c3.9-5.3.1-12.7-6.4-12.7zM440 852H208V148h560v344c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8V108c0-17.7-14.3-32-32-32H168c-17.7 0-32 14.3-32 32v784c0 17.7 14.3 32 32 32h272c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8z"/></svg> 
                                        Export
                                    </a> --}}
                                </div>
                                <div class="col-md-6">
                                    <div class="from-group row"> 
                                        <div class="col-sm-3">
                                            {{-- <label for="date" class="col-form-label col-sm-4">User</label> --}}
                                            <input type="search" value="{{ $values['search'] }}" class="form-control input-sm" id="searchuser" name="search" style="height: 31px; width:150px; margin-top:38px" placeholder="Search user"/>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="date" class="col-form-label col-sm-4">From</label>
                                            <input type="date" value="{{ $values['from'] }}" class="form-control input-sm" id="from" name="from" style="height: 31px; width:150px"/>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="date" class="col-form-label col-sm-2">To</label>
                                            <input type="date" value="{{ $values['to'] }}" class="form-control input-sm" id="to" name="to" style="height: 31px; width:150px"/>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn"  title="Search" style="margin-top: 35px; height:30px; width:40px"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="m18.677 19.607l-5.715-5.716a6 6 0 0 1-7.719-9.133a6 6 0 0 1 9.134 7.718l5.715 5.716l-1.414 1.414l-.001.001ZM9.485 5a4 4 0 1 0 2.917 1.264l.605.6l-.682-.68l-.012-.012A3.972 3.972 0 0 0 9.485 5Z"/></svg></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        {{-- <form action="" method="">
                        @csrf
                            <br>
                                <div class="container" style="align-items:flex-end">
                                    <div id="createblade-row" class="row justify-content-center align-items-center">
                                        <div id="createblade-column" class="col-md-8">
                                            <div id="createblade-box" class="col-md-12">
                                                <div class="container-fluid">
                                                    <div class="from-group row"> 
                                                        <div class="col-sm-3">
                                                            <label for="date" class="col-form-label col-sm-4">User</label>
                                                            <input type="search" class="form-control input-sm" id="searchuser" name="searchuser" required/>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label for="date" class="col-form-label col-sm-4">From</label>
                                                            <input type="date" class="form-control input-sm" id="from" name="from" required/>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label for="date" class="col-form-label col-sm-2">To</label>
                                                            <input type="date" class="form-control input-sm" id="to" name="to" required/>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <button type="submit" class="btn" name="search" title="Search">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            <br>
                        </form> --}}


                        <br/>
                        <br/>
                        <div class="table-responsive" id="toPrint">
                            <table class="table table-striped">
                                <div class="row">
                                    <div class="col-md-1" style="padding:50px">
                                        <img style="height: 100px; width:100px" src="{{ asset('image/baguioseal.png') }}">
                                    </div>
                                    <div class="col-md-6" style="padding:60px; margin-left:10px">
                                        <div class="col-md-6" style="font-weight:bold">
                                            Republic of the Philippines
                                        </div>
                                        <div class="col-md-6" style="font-weight:bold">
                                            CITY MAYOR'S OFFICE
                                        </div>
                                        <div class="col-md-6" style="font-weight:bold">
                                            City Government of Baguio
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-md-12 text-center" style="padding-bottom: 50px; font-weight:bold; font-size:17px">
                                    Management Information and Technology Division
                                </div>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th colspan="2" style="text-align: center;">Status</th>
                                        <th></th>
                                        <th colspan="2" style="text-align: center;">Status</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Users</th>
                                        <th style="text-align: center;">Total</th>
                                        <th style="text-align: center;">Incoming</th>
                                        <th style="text-align: center;">Done</th>
                                        <th style="text-align: center;">Pending</th>
                                        <th style="text-align: center;">Outgoing</th>
                                        <th style="text-align: center;">Done</th>
                                        <th style="text-align: center;">Pending</th>
                                    
                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->incoming_count + $item->outgoing_count}}</td>
                                        <td>{{ $item->incoming_count}}</td>
                                        <td>{{ $item->incoming_done_count}}</td>
                                        <td>{{ $item->incoming_pending_count}}</td>
                                        <td>{{ $item->outgoing_count}}</td>
                                        <td>{{ $item->outgoing_done_count}}</td>
                                        <td>{{ $item->outgoing_pending_count}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        
 
                    </div>
                    <script type="text/javascript">
                        // html2 = require(window.html2canvas);
                        const {jsPDF} = window.jspdf;

                        
                        $('#downloadPDF').click(function () {
                            var ratio = $('#toPrint').height() / $('#toPrint').width()
                            html2canvas(document.querySelector("#toPrint"), {scale: 3}).then(canvas => {
                                var imgData = canvas.toDataURL('image/png');
                                var doc = new jsPDF('p', 'mm', 'a4');
                                var width = doc.internal.pageSize.getWidth()
                                var height = ratio * width;
                                    doc.addImage(imgData, 'PNG', 4, 10, width-(4*2), height);
                                    doc.save('sample-file.pdf');
                            });
                        });
                        
                        // $('#downloadPDF').click(function() {       
                        //     html2canvas($("#toPrint"), {
                        //         onrendered: function(canvas) {         
                        //             var  imgData = canvas.toDataURL('image/png');           
                        //             var doc = new jsPDF('p', 'mm');
                        //             doc.addImage(imgData, 'PNG', 10, 10);
                        //             doc.save('sample-file.pdf');
                        //         }
                        //     });
                        // });
                        
                    </script>
                
            </div>
        </div>
        {{-- {{ $incoming->links() }} --}}
    </div>
</div>

@stop