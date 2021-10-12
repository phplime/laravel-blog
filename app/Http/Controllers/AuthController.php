<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Login;

class AuthController extends Controller
{
   public function login(){
       $data = [];
        $data['page_title'] = 'Login';
        return view('login.login',['data'=>$data]);
   }
   
    public function auth_login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        $fieldType = filter_var($credentials, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = [$fieldType =>$credentials['email'],'password'=>$credentials['password']];
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('successMsg','Login successfull');
        }else{
            session()->flash('successMsg', 'Invalid credentials');
            return redirect()->back();
        }
    }
    
    public function registration(){
       $insert = [
            'username' => 'demos',
            'name' => 'demos',
            'email' => 'demotestnms@gmail.com',
            'password' => Hash::make('1234'),
            'status' => 1,
        ];
        $lastId = User::insertGetId($insert);
         return redirect('/login')->with('successMsg','Created Success');
    }
    
    public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
