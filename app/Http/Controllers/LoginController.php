<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }
    

    public function loginUser(Request $request)
    {
        $request->validate([
            'username'=>'required|exists:users,name',
            'password'=>'required|min:8|max:16'
        ]);
        
        $user = User::where('name','=',$request->username)->first();
        if(!$user) {
            return back()->with('fail','Username does not exist.');
        }
        
        if(Hash::check($request->password, $user->password)) {
            $request->session()->put('Logged User', $user->id);
            return redirect('incoming');
        } else{
            return back()->with('fail', 'Incorrect password');
        }
    }

    public function register(Request $request){
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required|min:8',
        ]);
        
        $user = User::create([
            'name' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->username. '@mitd.com',
        ]);

    }

    public function forgotPassword(Request $request)
    {
        Auth::user()->password = Hash::make($request->password);
    }
}
