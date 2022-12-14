<?php

namespace App\Http\Controllers;

use App\Models\Incoming;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Outgoing;
use Carbon\Carbon;
use App\Models\Log;

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
        $fields['user_id'] = Auth::id();
        $item->remarksList()->create($fields);
        Log::create([
            'user_id' => Auth::id(),
            'old_data' => null,
            'new_data' => null,
            'action' => ' Added a Remark to ' . $item->subject,
            'module' => 'Outgoing'
        ]);

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
        $fields['user_id'] = Auth::id();
        $item->remarksList()->create($fields);
        Log::create([
            'user_id' => Auth::id(),
            'old_data' => null,
            'new_data' => null,
            'action' => ' Added a Remark to ' . $item->subject,
            'module' => 'Incoming'
        ]);

        return redirect()->route('incoming.show', ['incoming' => $id]);
    }
}
