@extends('incoming.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card" style="margin-top: 20px; margin-bottom:20px">

                    <div class="card-header">
                        <h4 class="text-center">Incoming Communications Page</h4>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ url('/incoming/create') }}" class="btn btn-sm" title="Add New Document" style="background-color: #6A5ACD; color:white">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New Document
                                </a>
                            </div>
                            {{-- <div class="col-md-3">  
                                <form action="{{ route('incoming.index') }}" method="get"> 
                                    <div class="input-group" style="margin-left: 310px">
                                        <input type="search" name="search" class="form-control" style="height: 31px; width:80px">
                                        <span class="input-group-prepend">
                                            <button type="submit" class="btn btn-sm" style="margin-left: 2px; background-color:#6A5ACD; color:white">Search</button>
                                        </span>
                                    </div>
                                </form> 
                            </div>--}}
                        </div>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Ctrl Internal</th>
                                        <th>Ctrl External</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Reciever</th>
                                        <th>Type of Service</th>
                                        <th>Subject</th>
                                        <th>Office Concerned</th>
                                        <th>Endorsed To</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($incoming as $item)
                                    <tr>
                                        <td>{{ $item->ctrli }}</td>
                                        <td>{{ $item->ctrle }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->time }}</td>
                                        <td>{{ $item->reciever }}</td>
                                        <td>{{ $item->typeofservice }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->officeconcerned }}</td>
                                        <td>{{ $item->endorsedto }}</td>

                                        
                                        {{--@if ($incoming->remarks=='Done')
                                         <td> 
                                            <iframe src="{{ asset ($item->files) }}" height="60" width="60"></iframe> 
                                            {{ $item->files }} 
                                            Uploaded
                                        </td>
                                        @else
                                        
                                        @endif --}}
                                        

                                        <td>{{ $item->remarks }}</td>

 
                                        <td>
                                            <div class="btn-group" role="group">
                                            <a href="{{ url('/incoming/' . $item->ctrli) }}" title="View"><button class="btn btn-sm" style="background-color: #E6E6FA"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/incoming/' . $item->ctrli . '/edit') }}" title="Edit"><button class="btn btn-sm" style="margin-left: 2px; background-color:#6A5ACD; color:white"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        
 
                    </div>
                
            </div>
        </div>
        {{ $incoming->links() }}
    </div>
@endsection