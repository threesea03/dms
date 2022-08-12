<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ComputeTimeController extends Controller
{
    public function computeTime(){
        $running_minutes = 0;
        $days = [
            [
                'date' => '2022-07-11',
                'start' => '7:20 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-07-11',
                'start' => '12:40 pm',
                'end' => '5:00 pm',
            ],
            [
                'date' => '2022-07-12',
                'start' => '7:28 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-07-12',
                'start' => '12:40 pm',
                'end' => '5:12 pm',
            ],
            [
                'date' => '2022-07-13',
                'start' => '7:30 am',
                'end' => '12:01 pm',
            ],
            [
                'date' => '2022-07-13',
                'start' => '12:35 pm',
                'end' => '5:13 pm',
            ],
            [
                'date' => '2022-07-14',
                'start' => '7:24 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-07-14',
                'start' => '12:41 pm',
                'end' => '5:05 pm',
            ],
            [
                'date' => '2022-07-16',
                'start' => '7:29 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-07-16',
                'start' => '12:31 pm',
                'end' => '5:05 pm',
            ],
            [
                'date' => '2022-07-18',
                'start' => '7:44 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-07-18',
                'start' => '12:45 pm',
                'end' => '5:02 pm',
            ],
            [
                'date' => '2022-07-19',
                'start' => '7:41 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-07-19',
                'start' => '12:40 pm',
                'end' => '4:30 pm',
            ],
            [
                'date' => '2022-07-20',
                'start' => '7:48 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-07-20',
                'start' => '12:31 pm',
                'end' => '5:01 pm',
            ],
            [
                'date' => '2022-07-21',
                'start' => '7:45 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-07-21',
                'start' => '12:31 pm',
                'end' => '5:01 pm',
            ],
            [
                'date' => '2022-07-22',
                'start' => '7:45 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-07-22',
                'start' => '12:31 pm',
                'end' => '5:00 pm',
            ],
            [
                'date' => '2022-07-25',
                'start' => '7:48 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-07-25',
                'start' => '12:31 pm',
                'end' => '5:01 pm',
            ],
            [
                'date' => '2022-07-26',
                'start' => '7:43 am',
                'end' => '12:02 pm',
            ],
            [
                'date' => '2022-07-26',
                'start' => '12:31 pm',
                'end' => '5:00 pm',
            ],
            [
                'date' => '2022-07-28',
                'start' => '7:46 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-07-28',
                'start' => '12:44 pm',
                'end' => '5:00 pm',
            ],
            [
                'date' => '2022-07-29',
                'start' => '7:58 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-07-29',
                'start' => '12:30 pm',
                'end' => '5:36 pm',
            ],
            [
                'date' => '2022-07-30',
                'start' => '7:55 am',
                'end' => '12:05 pm',
            ],
            [
                'date' => '2022-07-30',
                'start' => '12:31 pm',
                'end' => '3:27 pm',
            ],
            [
                'date' => '2022-08-01',
                'start' => '8:06 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-08-01',
                'start' => '12:35 pm',
                'end' => '5:11 pm',
            ],
            [
                'date' => '2022-08-02',
                'start' => '8:00 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-08-02',
                'start' => '12:47 pm',
                'end' => '5:10 pm',
            ],
            [
                'date' => '2022-08-03',
                'start' => '7:32 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-08-03',
                'start' => '12:40 pm',
                'end' => '5:00 pm',
            ],
            [
                'date' => '2022-08-04',
                'start' => '7:38 am',
                'end' => '10:30 am',
            ],
            [
                'date' => '2022-08-05',
                'start' => '7:39 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-08-05',
                'start' => '12:31 pm',
                'end' => '5:27 pm',
            ],
            [
                'date' => '2022-08-08',
                'start' => '7:42 am',
                'end' => '12:15 pm',
            ],
            [
                'date' => '2022-08-08',
                'start' => '12:52 pm',
                'end' => '5:01 pm',
            ],
            [
                'date' => '2022-08-09',
                'start' => '7:51 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-08-09',
                'start' => '12:51 pm',
                'end' => '5:01 pm',
            ],
            [
                'date' => '2022-08-10',
                'start' => '7:44 am',
                'end' => '12:00 pm',
            ],
            [
                'date' => '2022-08-09',
                'start' => '12:31 pm',
                'end' => '5:01 pm',
            ],
        ];
        
        foreach($days as $key=>$day){
            $minutes = Carbon::parse($day['date'] . ' '. $day['start'])->diffInMinutes(Carbon::parse($day['date'] . ' ' . $day['end']));
            $days[$key]['total'] = Carbon::parse($day['date'] . ' '. $day['start'])->diff(Carbon::parse($day['date'] . ' ' . $day['end']))->format('%H:%i:%s');
            $running_minutes += $minutes;
        }
        return view('incoming.dtr')->with('days', $days)->with('total', $running_minutes/60);
    }
}
