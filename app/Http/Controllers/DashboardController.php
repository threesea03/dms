<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
        $pending = Outgoing::where('remarks', 'Pending')->count();
         return view ('outgoing.index')
                     ->with('outgoing', $outgoing)
                     ->with('pending_count', $pending);
    }
}
