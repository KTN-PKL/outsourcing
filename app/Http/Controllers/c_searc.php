<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lowongan;

class c_searc extends Controller
{
    public function __construct()
    {
        $this->lowongan = new lowongan();
    }

    public function kata()
    {
        $data = $this->lowongan->data();
        $kata = " ";
        foreach ($data as $data1) {
            $data2 = strtolower($data1->posisi);
            $data3 = str_replace(' ', '', $data2);;
            if ($kata == " ") {
                $kata = $data3;
            } else {
                $kata = $kata." ".$data3;
            }
        }
        return $kata;
    }

    public function cari()
    {
        $kata = $this->kata();
        return $kata."";
    }
}
