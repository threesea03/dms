@extends('incoming.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding-top: 20px">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center"> Activity Logs </h4>
                </div>
                <div class="card-body">
                    <div class="col-md-3">  
                        <form action="{{ route('incoming.logs') }}" method="get"> 
                          <div class="input-group" style="margin-left: 900px; margin-top:8px; padding-bottom:20px">
                              <input type="search" name="search" class="form-control" style="height: 31px" placeholder="Search activity">
                              <span class="input-group-prepend">
                                  <button type="submit" class="btn btn-sm" style="margin-left: 2px; background-color:#DCDCDC">Search</button>
                              </span>
                          </div>
                        </form> 
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Users</th>
                                <th>Action</th>
                                <th>Module</th>
                                <th>Date and Time</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($logs as $log) 
                            <tr>
                                <td>{{ $log->id }}
                                <td>{{ $log->user_id }}
                                <td>{{ $log->user->name }}</td>
                                <td>{{ $log->action }}
                                <td>{{ $log->module }}
                                <td>{{ $log->ph_time }}
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    {{ $logs->links() }}
</div>

@stop