<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class c_login extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'email1' => 'required',
            'password1' => 'required',
        ],[
            'email1.required'=>'Email wajib terisi',
            'password1.required'=>'Password wajib terisi',
        ]);
        $user = $request->email1;
        $pass = $request->password1;

        if(auth()->attempt(array('email'=>$user,'password'=>$pass)))
        {
            if (Auth::user()->level == 1){
                return redirect()->route('admin.dashboard');
            }
            elseif (Auth::user()->level == 2) {
                return redirect()->route('perusahaan.dashboard');
            }
            else {
                return redirect()->back();
            };
        }
        else
        {
            session()->flash('error', 'Email atau password salah');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('user.login');
    }

    // // Login multiuser
    // public function dashboard(){

    //     if (Auth::user()->level == 1){
    //         return redirect()->route('admin.dashboard');
    //     }
    //     elseif (Auth::user()->level == 2) {
    //         return redirect()->route('perusahaan.dashboard');
    //     }
    //     else {
    //         return redirect()->back();
    //     };
       
    // }
}
