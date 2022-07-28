<?php

namespace App\Http\Controllers;
use App\Models\Outgoing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutgoingController extends Controller
{
    public function index()
    {
        $outgoing = Outgoing::all();
        return view ('outgoing.index')->with('outgoing', $outgoing);
    }
    
    public function create()
    {
        return view('outgoing.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
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
    
    public function update(Request $request, $id)
    {
        $outgoing = Outgoing::find($id);
        $input = $request->all();
        $outgoing->update($input);
        return redirect('outgoing')->with('flash_message', 'File Updated.');  
    }
  
    public function destroy($id)
    {
        Outgoing::destroy($id);
        return redirect('outgoing')->with('flash_message', 'File deleted.');  
    }
    
    
}