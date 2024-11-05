<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('pages.Auth.login');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|regex:/\S+/',
            'password' => 'required|string|min:8|regex:/\S+/',
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        $credentials = $request->only('email', 'password');
    
        if (!Auth::attempt($credentials)) {
            return back()->with(['error' => 'Invalid email or password']);
        }
        
    
       
        $request->session()->regenerate();

        if(auth()->user()->role == 'admin'){
            return redirect()->route('dashboard');
        }
    
        return redirect()->route('home'); 
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
