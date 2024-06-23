<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
    public function signup(){
        return view('Auth.register');
    }
    public function signin(){
        return view('Auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (\Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }
    
        return redirect('login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    

    public function register(Request $request){
        $request->validate([
          'name'=>'required',
          'email'=>'required|email',
          'password'=>'required',
      ]);
  
      user::create([
          'name'=>$request->name,
          'email'=>$request->email,
          'password'=> \Hash::make($request->password)
      ]);
  
      if(\Auth::attempt($request->only('email','password'))){
          return redirect('home');
      }
  
      return redirect('register')->with('Error');
  }

  
  public function logout(){
    \Session::flush();
    \Auth::logout();
    return redirect('/');
 }
  
}
