<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lowongan;

class c_landingpage extends Controller
{
    public function __construct()
    {
         $this->lowongan= new lowongan();
    }

    public function landingPage()
    {
        $data=[
            'lowongan'=>$this->lowongan->aktifData(),
        ]; 
        return view('user.user',$data);       
    }
    public function daftarPerusahaan()
    {
        // $data=[
        //     'lowongan'=>$this->lowongan->allData(),
        // ]; 
        return view('user.v_daftarperusahaan');       
    }
}
