@extends('incoming.layout')
@section('content')

<div class="container"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin-top: 20px; margin-bottom:20px">

                    <div class="card-header">
                        <h4 class="text-center">Manage Accounts</h4>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ url('register') }}" class="btn btn-sm" title="Add New Document" style="background-color: #6A5ACD; color:white">
                                    <i class="fa fa-plus" aria-hidden="true"></i> + Add User
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->created_at }}</td>

                                        
                                        {{--@if ($incoming->remarks=='Done')
                                         <td> 
                                            <iframe src="{{ asset ($item->files) }}" height="60" width="60"></iframe> 
                                            {{ $item->files }} 
                                            Uploaded
                                        </td>
                                        @else
                                        
                                        @endif --}}

 
                                        <td>
                                            <div class="btn-group" role="group">
                                            <a href="{{ url('user/' .$item->id) }}" title="View"><button class="btn btn-sm" style="background-color: #E6E6FA"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <form method="POST" action="{{ url('/manage-accounts' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" style="margin-left: 2px; background-color:#6A5ACD; color:white" class="btn btn-sm" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
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
        {{-- {{ $incoming->links() }} --}}
    </div>
</div>
@stop