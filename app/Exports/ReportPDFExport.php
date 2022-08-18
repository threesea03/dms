<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportPDFExport implements FromQuery, WithHeadings, WithStyles
{


    public function styles(Worksheet $sheet){
        return [
             1    => ['font' => ['bold' => true], 'width' => 50],
             2    => ['font' => ['bold' => true]],
             3    => ['font' => ['bold' => true]],
             4    => ['font' => ['bold' => true]],
             5    => ['font' => ['bold' => true]],
             7    => ['font' => ['bold' => true]],
        ];
    }

    public function headings(): array
    {
        return   [
            'Name',
            'Total Documents',
            'Total Incoming Documents',
            'Pending Incoming Documents',
            'Done Incoming Documents',
            'Total Outgoing Documents',
            'Pending Outgoing Documents',
            'Done Outgoing Documents',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
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
