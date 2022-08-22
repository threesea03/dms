<?php

namespace App\Exports;

use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportExport implements FromQuery, ShouldAutoSize, WithHeadings, WithStyles, WithDrawings
{
    use Exportable;


    public function __construct($search, $from, $to)
    {
        $this->search = $search;
        $this->from = $from;
        $this->to = $to;
    }

    public function drawings()
    {
        $logo = new Drawing;
        $logo->setName('Baguio City Logo');
        $logo->setDescription('Baguio City Hall Seal');
        $logo->setPath(public_path('/image/baguioseal.png'));
        $logo->setHeight(90);
        $logo->setCoordinates('A1');
        return $logo;
    }

    public function styles(Worksheet $sheet){
        return [
             1    => ['font' => ['bold' => true]],
             2    => ['font' => ['bold' => true]],
             3    => ['font' => ['bold' => true]],
             4    => ['font' => ['bold' => true]],
             5    => ['font' => ['bold' => true]],
             7    => ['font' => ['bold' => true]],
        ];
    }

    public function headings(): array
    {
        return [
            [
                '',
                'Baguio City Hall',
            ],
            [
                '',
                "Mayor's Office",
            ],
            [
                '',
                "Management in Information Technology Division",
            ],
            [
                '',
                "Data Center",
            ],
            [
                '',
                'MITD Docutracker Report',
            ],
            [
                '',
                '',
            ],
            [
                'Name',
                'Total Documents',
                'Total Incoming Documents',
                'Pending Incoming Documents',
                'Done Incoming Documents',
                'Total Outgoing Documents',
                'Pending Outgoing Documents',
                'Done Outgoing Documents',
            ]
        ];
    }

    public function query()
    {
        $range = [$this->from, $this->to];

        if(!isset($from) || $from ==  ''){
            $range[0] = Carbon::now()->startOfCentury();
            if(isset($to)){
                $range[1] = Carbon::parse($to);
            }
        }

        if(!isset($to) || $to ==  ''){
            $range[1] = Carbon::now();
            if(isset($from)){
                $range[0] = Carbon::parse($from);
            }
        }
        $searchkeys = preg_split('/\s+./', $this->search, -1, PREG_SPLIT_NO_EMPTY);
        $results = User::select('name')->withCount([
                            'incoming',
                            'incoming as incoming_count' => function ($query) use ($range){
                                $query->whereBetween('date', $range);
                            },
                            'incoming as incoming_pending_count' => function($query) use ($range) {
                                $query->where('remarks', 'Pending')->whereBetween('date', $range);
                            },
                            'incoming as incoming_done_count' => function($query) use ($range) {
                                $query->where('remarks', 'Done')->whereBetween('date', $range);
                            },
                            'outgoing',
                            'outgoing as outgoing_count' => function ($query) use ($range) {
                                $query->whereBetween('date', $range);
                            },
                            'outgoing as outgoing_pending_count' => function($query) use ($range) {
                                $query->where('progresschek', 'Pending')->whereBetween('date', $range);
                            },
                            'outgoing as outgoing_done_count' => function($query) use ($range) {
                                $query->where('progresschek', 'Done')->whereBetween('date', $range);
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
