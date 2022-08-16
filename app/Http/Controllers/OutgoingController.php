<?php

namespace App\Http\Controllers;

use App\Models\Outgoing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DocumentRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;

class OutgoingController extends Controller
{
    public function index(Request $request)
    {
        $outgoing = Outgoing::where('subject', 'like', '%'. $request->search . '%')
                            ->orWhere('typeofservice', 'like', '%'. $request->search .'%')
                            ->orWhere('officeconcerned', 'like', '%'. $request->search .'%')
                            ->orWhere('name', 'like', '%'. $request->search .'%')
                            ->orWhere('agency', 'like', '%'. $request->search .'%')
                            ->orWhere('date', 'like', '%'. $request->search .'%')
                            ->orderBy('ctrli','DESC')
                            ->paginate(10);
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
        $input['user_id'] = Auth::id();
        $fileName = time().$request->file('files')->getClientOriginalName();
        $path = $request->file('files')->storeAs('files',$fileName,'public');
        $input["files"] = '/storage/'.$path;
        Outgoing::create($input);
        Log::create([
            'user_id' => Auth::id(),
            'old_data' => null,
            'new_data' => null,
            'action' => ' Created a Record',
            'module' => 'Outgoing'
        ]);
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
        if($request->file('files')){
            $fileName = time().$request->file('files')->getClientOriginalName();
            $path = $request->file('files')->storeAs('files',$fileName,'public');
            $input["files"] = '/storage/'.$path;
        }else{
            $input['files'] = $outgoing->files;
        }
        $outgoing->update($input);
        Log::create([
            'user_id' => Auth::id(),
            'old_data' => null,
            'new_data' => null,
            'action' => ' Updated ' . $outgoing->subject,
            'module' => 'Outgoing'
        ]);
        return redirect('outgoing')->with('flash_message', 'File Updated.');  
    }

    public function userprofile()
    {
        // $outgoing = Outgoing::find($id);
        return view('outgoing.userprofile');
    }
    
    
}