<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use App\Exports\ReportExport;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    //
    public function report(Request $request)
    {
        $users = $this->searchQuery($request->search ?? '', $request->from, $request->to)->get();
        return view('incoming.report')
                ->with('items', $users)
                ->with('values', [
                    'search' => $request->search,
                    'from' => $request->from,
                    'to' => $request->to,
                ]);
    }

    public function dateFilter(Request $request)
    {
        $items = $request->all();
        // ->whereBetween('created_at',[$request->from, $request->to])
        // ->get();
        return view('incoming.report')->with('items',$items);
    }

    public function exportReport(Request $request){

        return (new ReportExport($request->search, $request->from, $request->to))->download('Docutracker Export.xlsx');
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
