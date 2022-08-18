<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            if(Auth::user()->isNew){
                return redirect()->route('changepassword');
            }else{
                return redirect()->route('dashboard');
            }
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
        ]);
        $fields['name'] = $fields['first_name'] . ' ' . $fields['middle_name'] . ' ' . $fields['last_name'];
        $pass = Str::random(9);
        $name = $fields['name'];
        $fields['password'] = Hash::make($pass);
        $user = User::create($fields);
        Log::create([
            'user_id' => Auth::id(),
            'old_data' => null,
            'new_data' => null,
            'action' => ' One Account Created: ' .$user->username,
            'module' => 'User'
        ]);
        return redirect()->route('showRegister')->with('message', "$name's password is $pass, please be sure to change this accounts password on login. ");
    }

    public function forgotPassword(Request $request)
    {
        $fields = $request->validate([
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ]
        ]); 
        $user = Auth::user();
        $user->password = Hash::make($fields['password']);
        $user->isNew = false;
        $user->save();
        return redirect()->route('incoming.index');
    }

    public function setup()
    {
        return view('auth.forgotpassword');
    }

    public function destroy($id)
    {
        User::destroy($id);
        Log::create([
            'user_id' => Auth::id(),
            'old_data' => null,
            'new_data' => null,
            'action' => ' One Account Deleted ',
            'module' => 'User'
        ]);
        return redirect()->route('accounts')->with('flash_message', 'Deleted Successfully!');  
    }


}
