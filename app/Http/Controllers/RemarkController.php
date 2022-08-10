<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outgoing;
use Carbon\Carbon;

class RemarkController extends Controller
{
    public function addOutgoing(Request $request, $id)
    {
        $fields = $request->validate([
            'header' => 'nullable',
            'body' => 'required'
        ]);
        $item = Outgoing::find($id);
        $fields['header'] = Carbon::now()->toFormattedDateString();
        $fields['remarkable_id'] = $id;
        $item->remarksList()->create($fields);

        return redirect()->route('outgoing.show', ['outgoing' => $id]);
    }
}
