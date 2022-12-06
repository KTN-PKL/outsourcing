<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_filter extends Controller
{
    public function filter(Request $request)
    {
        $tipe = null;
        for ($i=1; $i < 5; $i++) { 
            if ($request->{"tipe".$i} <> null) {
                if ($tipe == null) {
                    $tipe = $request->{"tipe".$i};
                } else {
                    $tipe = $tipe."++".$request->{"tipe".$i};
                }
            }
        } $data1 = explode("++",$tipe);
        $pengalaman = null;
        for ($i=1; $i < 5; $i++) { 
            if ($request->{"pengalaman".$i} <> null) {
                if ($pengalaman == null) {
                    $pengalaman = $request->{"pengalaman".$i};
                } else {
                    $pengalaman = $pengalaman."++".$request->{"pengalaman".$i};
                }
            }
        } $data2 = explode("++",$pengalaman);
        $data = [
            'lowongan' => $this->lowongan->filter($data1,$data2),
        ];
        return view('view',$data);
    }
}
