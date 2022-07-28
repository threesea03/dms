@extends('incoming.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card" style="margin-top: 20px">

                    <div class="card-header">
                        <h2 class="text-center">Incoming Communications Page</h2>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ url('/incoming/create') }}" class="btn btn-success btn-sm" title="Add New Document">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New Document
                                </a>
                            </div>
                            <div class="col-md-3">
                                <form action="/search" method="get">
                                    <div class="input-group" style="margin-left: 310px">
                                        <input type="search" name="search" class="form-control" style="height: 31px; width:80px">
                                        <span class="input-group-prepend">
                                            <button type="submit" class="btn btn-success btn-sm" style="margin-left: 2px">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
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
                                        <th>Files</th>
                                        <th>Remarks</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($incoming as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->ctrle }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->time }}</td>
                                        <td>{{ $item->reciever }}</td>
                                        <td>{{ $item->typeofservice }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->officeconcerned }}</td>
                                        <td>{{ $item->endorsedto }}</td>
                                        <td>
                                            <iframe src="{{ asset ($item->files) }}" height="60" width="60"></iframe>
                                        </td>

                                        <td>{{ $item->remarks }}</td>
 
                                        <td>
                                            <div class="btn-group" role="group">
                                            <a href="{{ url('/incoming/' . $item->ctrli) }}" title="View"><button class="btn btn-danger btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/incoming/' . $item->ctrli . '/edit') }}" title="Edit"><button class="btn btn-success btn-sm" style="margin-left: 2px"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
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
    </div>
@endsection