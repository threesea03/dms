<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Incoming;
use Illuminate\Support\Facades\DB;

class IncomingController extends Controller
{
    public function index()
    {
        $incoming = Incoming::all();
        return view ('incoming.index')->with('incoming', $incoming);
    }
    
    public function create()
    {
        return view('incoming.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        $fileName = time().$request->file('files')->getClientOriginalName();
        $path = $request->file('files')->storeAs('files',$fileName,'public');
        $input["files"] = '/storage/'.$path;
        Incoming::create($input);
        return redirect('incoming')->with('flash_message', 'Added SUccessfuly!');  
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
  
    public function update(Request $request, $id)
    {
        $incoming = Incoming::find($id);
        $input = $request->all();
        $incoming->update($input);
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
}
 