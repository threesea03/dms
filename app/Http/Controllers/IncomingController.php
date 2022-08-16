<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Incoming;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncomingController extends Controller
{
    public function index(Request $request)
    {
        $incoming = Incoming::orWhere('reciever', 'like', '%'. $request->search . '%')
                            ->orWhere('typeofservice', 'like', '%'. $request->search .'%')
                            ->orWhere('subject', 'like', '%'. $request->search .'%')
                            ->orWhere('date', 'like', '%'. $request->search .'%')
                            ->orWhere('endorsedto', 'like', '%'. $request->search .'%')
                            ->orWhere('ctrle', 'like', '%'. $request->search .'%')
                            ->orderBy('ctrli','DESC')
                            ->paginate(5); 
                            //->get();
        // $incoming = Incoming::all();
        return view ('incoming.index')->with('incoming', $incoming);
    }
    
    public function create()
    {
        return view('incoming.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        $input['remarks']= $request->remarks ?? $request->remarks_type;
        $input['user_id'] = Auth::id();
        $fileName = time().$request->file('files')->getClientOriginalName();
        $path = $request->file('files')->storeAs('files',$fileName,'public');
        $input["files"] = '/storage/'.$path;
        $document = Incoming::create($input);
        Log::create([
            'user_id' => Auth::id(),
            'old_data' => null,
            'new_data' => null,
            'action' => ' Created a Record',
            'module' => 'Incoming'
        ]);
        return redirect('incoming')->with('flash_message', 'Added SUccessfully!');  
    }
    

    public function show($id)
    {
        $incoming = Incoming::find($id);
        return view('incoming.show')->with('incoming', $incoming);
    }
    
    public function edit($id)
    {
        $incoming = Incoming::find($id);
        return view('incoming.edit')->with('incoming', $incoming);
    }
  
    public function update(DocumentRequest $request, $id)
    {
        $incoming = Incoming::find($id);
        $input = $request->all();
        if($request->file('files')){
            $fileName = time().$request->file('files')->getClientOriginalName();
            $path = $request->file('files')->storeAs('files',$fileName,'public');
            $input["files"] = '/storage/'.$path;
        }else{
            $input['files'] = $incoming->files;
        }
        $incoming->update($input);
        // Log::create([
        //     'user_id' => 1,
        //     'action' => 'update',
        //     'module' => 'Incoming',
        // ]);
        Log::create([
            'user_id' => Auth::id(),
            'old_data' => null,
            'new_data' => null,
            'action' => ' Updated ' . $incoming->subject,
            'module' => 'Incoming'
        ]);
        return redirect('incoming')->with('flash_message', 'Updated SUccessfully!');  
    }
  
    public function destroy($id)
    {
        Incoming::destroy($id);
        return redirect('incoming')->with('flash_message', 'Deleted Successfully!');  
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $incoming = DB::table('incoming')->where('ctrli','LIKE','%'.$search.'%')->paginate(5); 
        return view('incoming.index')->with('incoming', $incoming);
    }

    public function profile()
    {
        // $login = Incoming::find($id);
        return view('incoming.profile')->with(
            'user', Auth::user()
        );
    }

    public function dashboard()
    {
        return view('incoming.dashboard');
    }

    public function logs(Request $request)
    {
        $logs = Log::with('user:id,name')
                ->where('created_at', 'like', '%'. $request->search . '%')
                ->orWhere('action', 'like', '%'. $request->search .'%')
                ->orWhere('module', 'like', '%'. $request->search .'%')
                ->orderBy('id','DESC')
                ->paginate(10);
        return view('incoming.logs')->with('logs', $logs);
    }

}
 