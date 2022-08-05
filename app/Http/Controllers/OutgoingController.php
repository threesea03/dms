<?php

namespace App\Http\Controllers;

use App\Models\Outgoing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DocumentRequest;
use Illuminate\Support\Facades\Storage;

class OutgoingController extends Controller
{
    public function index(Request $request)
    {
        $outgoing = Outgoing::where('subject', 'like', '%'. $request->search . '%')
                            ->orWhere('typeofservice', 'like', '%'. $request->search .'%')
                            ->orderBy('ctrli','DESC')
                            ->get();
        return view ('outgoing.index')->with('outgoing', $outgoing);
    }
    
    public function create()
    {
        return view('outgoing.create');
    }
  
    public function store(Request $request)
    {   
        $input = $request->all();
        $input['remarks'] =  $request->remarks ?? $request->remarks_type;
        $fileName = time().$request->file('files')->getClientOriginalName();
        $path = $request->file('files')->storeAs('files',$fileName,'public');
        $input["files"] = '/storage/'.$path;
        Outgoing::create($input);
        return redirect('outgoing')->with('flash_message', 'Added Successfully.');  
    }
    
    public function edit($id)
    {
        $outgoing = Outgoing::find($id);
        return view('outgoing.edit')->with('outgoing', $outgoing);
    }

    public function show($id)
    {
        $outgoing = Outgoing::find($id);
        return view('outgoing.show')->with('outgoing', $outgoing);
    }
    
    public function update(DocumentRequest $request, $id)
    {
        $outgoing = Outgoing::find($id);
        $input = $request->all();
        $fileName = time().$request->file('files')->getClientOriginalName();
        $path = $request->file('files')->storeAs('files',$fileName,'public');
        $input["files"] = '/storage/'.$path;
        $outgoing->update($input);
        return redirect('outgoing')->with('flash_message', 'File Updated.');  
    }

    public function userprofile()
    {
        // $outgoing = Outgoing::find($id);
        return view('outgoing.userprofile');
    }
    
    
}