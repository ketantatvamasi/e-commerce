<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator ,Auth;
class AdminLoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function authenticate(Request $request){
        $this->validate($request,[
           'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->get('remember'))){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function index(){
        return view('dashboard');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
