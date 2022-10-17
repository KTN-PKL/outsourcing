<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lowongan;
use Auth;

class c_lowongan extends Controller
{
    public function __construct()
    {
        $this->lowongan = new lowongan();
    }

    public function indexuser()
    {
        
    }

    public function indexperusahaan()
    {
        $id_perusahaan = Auth::user()->id;

        $data = [
            'lowongan' => $this->lowongan->perusahaanData($id_perusahaan),
        ];
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->Validate([
            
        ]);
    }
}
