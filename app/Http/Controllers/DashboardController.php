<?php

namespace App\Http\Controllers;
use App\Models\{Outgoing, Incoming};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        
        $outgoing_count = Outgoing::count();
        $incoming_count = Incoming::count();
        $user_count = Incoming::count();
        $total_count = $outgoing_count + $incoming_count;
        $pending_out = Outgoing::where('progresschek', 'Pending')->count();
        $done_out = Outgoing::where('progresschek', 'Done')->count();
        $pending_in = Incoming::where('remarks', 'Pending')->count();
        $done_in = Incoming::where('remarks', 'Done')->count();
        return view('admin.dashboard')
                        ->with('user_count', $user_count)
                        ->with('done_out', $done_out)
                        ->with('pending_out', $pending_out)
                        ->with('pending_in', $pending_in)
                        ->with('done_in', $done_in)
                        ->with('outgoing_count', $outgoing_count)
                        ->with('incoming_count', $incoming_count)
                        ->with('total_count', $total_count);
    }

}
