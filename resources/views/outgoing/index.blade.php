@extends('outgoing.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin-top: 20px">
                    <div class="card-header">
                        <h4 class="text-center">Outgoing Communications Page</h4>
                    </div>
                    <div class="card-body">
                            <div class="col-md-6">
                                <a href="{{ url('/outgoing/create') }}" class="btn btn-sm" title="Add New Document" style="background-color: #3A6289; color:white">
                                    <i class="fa fa-plus" aria-hidden="true"></i> + Add Document
                                </a>
                            </div>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($outgoing as $item)
                                    <tr>
                                        <td>{{ $item->ctrli }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->time }}</td>
                                        <td>{{ $item->typeofservice }}</td>
                                        <td>{{ $item->officeconcerned }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->agency }}</td>
                                        <td>{{ $item->timereceived }}</td>
                                        <td>{{ $item->progresschek }}</td>

                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ url('/outgoing/' . $item->ctrli) }}" title="View"><button style="background-color: #3B919B; color:white" class="btn btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>View</button></a>
                                                <a href="{{ url('/outgoing/' . $item->ctrli . '/edit') }}" title="Edit"><button class="btn btn-sm" 
                                                    style="margin-left: 2px; background-color: #3A6289; color:white"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button></a>
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
            {{ $outgoing->links() }}
        </div>
    </div>
@endsection