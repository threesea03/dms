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

    public function regeneratePassword(Request $request)
    {
        $fields = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);
        $user = User::find($fields['user_id']);
        $password = Str::random(10);
        $user->password = Hash::make($password);
        $user->isNew = true;
        $user->save();
        return view('incoming.profile')->with('user',$user)->with('password', $password);
    }

    // public function passwordQuestion()
    // {
    //     return view('auth.getpassword');
    //     // ->with('login', $login)
    // }

    public function setup()
    {
        return view('auth.forgotpassword');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('accounts')->with('flash_message', 'Deleted Successfully!');  
    }


}
