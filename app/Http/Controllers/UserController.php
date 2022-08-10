<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function manageuser()
    {
        $users = User::all();
        return view('incoming.accounts')->with(
            'users', $users
        );
    }

    public function show(Request $request, User $user)
    {
        return view('incoming.profile')->with('user',$user);
    }
}
