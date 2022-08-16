<?php

namespace App\Exports;

use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ReportExport implements FromQuery
{
    use Exportable;

    public function __construct($search, $from, $to)
    {
        $this->search = $search;
        $this->from = $from;
        $this->to = $to;
    }

    public function query()
    {
        $range = [$this->from, $this->to];

        if(!isset($this->from) || $this->from ==  ''){
            $range[0] = Carbon::now()->startOfCentury();
        }

        if(!isset($this->to) || $this->to ==  ''){
            $range[1] = Carbon::now();
        }
        $searchkeys = preg_split('/\s+./', $this->search, -1, PREG_SPLIT_NO_EMPTY);
        $results = User::select('name')->withCount([
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
