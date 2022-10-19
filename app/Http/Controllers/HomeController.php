<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
           }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->level == 1){
            return view('admin.v_admin');
        }
        elseif (Auth::user()->level == 2) {
            return view('perusahaan.v_perusahaan');
        }
        else {
            return redirect()->back();
        };
    }

}
