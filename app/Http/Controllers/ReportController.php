<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function report(Request $request)
    {
        $users = $this->searchQuery($request->search ?? '')->get();
        return view('incoming.report')
                ->with('items', $users);
    }

    public function searchQuery($search){
        $searchkeys = preg_split('/\s+./', $search, -1, PREG_SPLIT_NO_EMPTY);
        $results = User::withCount(['incoming', 'outgoing'] )
            ->where(function($query) use($searchkeys) {
            foreach($searchkeys as $key){
                $query->orWhere('first_name', 'like', '%'. $key.'%')
                    ->orWhere('middle_name', 'like', '%'. $key.'%')
                    ->orWhere('last_name', 'like', '%'. $key.'%');
            }
        });
        return $results;
    }
}
