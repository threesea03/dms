@extends('outgoing.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card" style="margin-top: 20px">
                    <div class="card-header">
                        <h2>Outgoing Documents</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/outgoing/create') }}" class="btn btn-success btn-sm" title="Add New Document">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Document
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>CtrlNo. Internal</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Type of Service</th>
                                        <th>Office Concerned</th>
                                        <th>Subject</th>
                                        <th>Name</th>
                                        <th>Agency</th>
                                        <th>Time Received</th>
                                        <th>Files</th>
                                        <th>Remarks</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($outgoing as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->time }}</td>
                                        <td>{{ $item->typeofservice }}</td>
                                        <td>{{ $item->officeconcerned }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->agency }}</td>
                                        <td>{{ $item->timereceived }}</td>
                                        <td><iframe src="{{ asset ($item->files) }}" height="60" width="60"></iframe></td>
                                        <td>{{ $item->remarks }}</td>

                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ url('/outgoing/' . $item->ctrli) }}" title="View"><button class="btn btn-secondary btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>View</button></a>
                                                <a href="{{ url('/outgoing/' . $item->ctrli . '/edit') }}" title="Edit"><button class="btn btn-danger btn-sm" 
                                                    style="margin-left: 2px"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button></a>
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
    </div>
@endsection