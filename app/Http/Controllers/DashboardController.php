<?php

namespace App\Http\Controllers;
use App\Models\{Outgoing, Incoming, User};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        
        $outgoing_count = Outgoing::count();
        $incoming_count = Incoming::count();
        $user_count = Incoming::count();
        $total_count = $outgoing_count + $incoming_count;
        $items = $this->searchQuery('', now()->startOfCentury(), now())->get();
        $pending_out = Outgoing::where('progresschek', 'Pending')->count();
        $done_out = Outgoing::where('progresschek', 'Done')->count();
        $pending_in = Incoming::where('remarks', 'Pending')->count();
        $done_in = Incoming::where('remarks', 'Done')->count();
        return view('admin.dashboard')
                        ->with('items', $items)
                        ->with('user_count', $user_count)
                        ->with('done_out', $done_out)
                        ->with('pending_out', $pending_out)
                        ->with('pending_in', $pending_in)
                        ->with('done_in', $done_in)
                        ->with('outgoing_count', $outgoing_count)
                        ->with('incoming_count', $incoming_count)
                        ->with('total_count', $total_count);
    }

    public function searchQuery($search, $from, $to){
        $range = [$from, $to];

        if(!isset($from) || $from ==  ''){
            $range[0] = Carbon::now()->startOfCentury();
        }

        if(!isset($to) || $to ==  ''){
            $range[1] = Carbon::now();
        }
        $searchkeys = preg_split('/\s+./', $search, -1, PREG_SPLIT_NO_EMPTY);
        $results = User::withCount([
                            'incoming',
                            'incoming as incoming_count' => function ($query) use ($range){
                                $query->whereBetween('created_at', $range);
                            },
                            'incoming as incoming_pending_count' => function($query) use ($range) {
                                $query->where('remarks', 'Pending')->whereBetween('created_at', $range);
                            },
                            'incoming as incoming_done_count' => function($query) use ($range) {
                                $query->where('remarks', 'Done')->whereBetween('created_at', $range);
                            },
                            'outgoing',
                            'outgoing as outgoing_count' => function ($query) use ($range) {
                                $query->whereBetween('created_at', $range);
                            },
                            'outgoing as outgoing_pending_count' => function($query) use ($range) {
                                $query->where('progresschek', 'Pending')->whereBetween('created_at', $range);
                            },
                            'outgoing as outgoing_done_count' => function($query) use ($range) {
                                $query->where('progresschek', 'Done')->whereBetween('created_at', $range);
                            },
                        ])
            ->where(function($query) use($searchkeys, $range) {
                foreach($searchkeys as $key){
                    $query->orWhere('first_name', 'like', '%'. $key.'%')
                        ->orWhere('middle_name', 'like', '%'. $key.'%')
                        ->orWhere('last_name', 'like', '%'. $key.'%');
                }
            });
        return $results;
    }
}
