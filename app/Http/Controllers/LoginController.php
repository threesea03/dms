<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();

        return view('auth.login');
    }
    

    public function loginUser(Request $request)
    {
        $request->validate([
            'username'=>'required|exists:users,username',
            'password'=>'required|min:8|max:16'
        ]);
        
        $user = User::where('username','=',$request->username)->first();
        
        if(!$user) {
            return back()->with('fail','Username does not exist.');
        }
        
        if(Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->put('Logged User', $user->id);
            return redirect('incoming');
        } else{
            return back()->with('fail', 'Incorrect password');
        }
    }
    
    public function showRegister()
    {
        return view('incoming.register');
    }

    public function register(Request $request){
        $fields = $request->validate([
            'username' => 'required|unique:users,username',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'address' => 'required',
            'phonenumber' => 'required',
            'email' => 'required',
            // 'password' => Password::min(8)
            //                 ->letters()
            //                 ->mixedCase()
            //                 ->numbers()
            //                 ->symbols(),
            'password' => 'required'
        ]);

        $fields['name'] = $fields['first_name'] . ' ' . $fields['middle_name'] . ' ' . $fields['last_name'];
        
        $user = User::create($fields);

        return redirect()->route('accounts');
    }

    public function forgotPassword(Request $request)
    {
        Auth::user()->password = Hash::make($request->password);
    }


}
