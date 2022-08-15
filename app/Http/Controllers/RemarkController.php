<?php

namespace App\Http\Controllers;

use App\Models\Incoming;
use Illuminate\Http\Request;
use App\Models\Outgoing;
use Carbon\Carbon;

class RemarkController extends Controller
{
    public function addOutgoing(Request $request, $id)
    {
        $fields = $request->validate([
            'header' => 'nullable',
            'body' => 'required',
            'time' => 'nullable',
        ]);
        $item = Outgoing::find($id);
        $fields['header'] = Carbon::now()->format('d-m-Y | h:i:m');
        $fields['remarkable_id'] = $id;
        $item->remarksList()->create($fields);
        // $fields ['time']= Carbon::now()->toFormattedDateString();

        return redirect()->route('outgoing.show', ['outgoing' => $id]);
    }

    public function addIncoming(Request $request, $id)
    {
        $fields = $request->validate([
            'header' => 'nullable',
            'body' => 'required'
        ]);
        $item = Incoming::find($id);
        $fields['header'] = Carbon::now()->toFormattedDateString();
        $fields['remarkable_id'] = $id;
        $item->remarksList()->create($fields);

        return redirect()->route('incoming.show', ['incoming' => $id]);
    }
}
