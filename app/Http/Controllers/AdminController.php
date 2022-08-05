<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    function login()
    {
        return view('admin.login');
    }

    function save(Request $request)
     {
         $request->validate([
             'username'=>'required|unique:admins',
            //  'password' => ['required', 
            //    'min:5', 'max:8', 
            //    'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/']

            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            // 'password_confirmation' => 'required|same:password'
         ]);

         //Insert data into the database
        //  $admin = new admin;
        //  $admin->username = $request->username;
        //  $admin->password = $request->password;
        //  $save = $admin->save();

        // if($save){
            // return back()->with('success', 'New user has been successfully added.');
            // } else 
            // {return bak()->with('fail', 'Something wnet wrong. Please try again later.');}

     }
}
