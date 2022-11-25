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
        $data = $this->lowongan->aktifData();
        $kata = " ";
        foreach ($data as $data1) {
            $data2 = strtolower($data1->posisi);
            $data3 = str_replace(' ', '', $data2);
            if ($kata == " ") {
                $kata = $data3;
            } else {
                $kata = $kata." ".$data3;
            }
        }
        return $kata;
    }

    public function cek($cari)
    {
        $str = explode(" ",$cari);
        $d = 0;
        $h[0] = 0;
        $z = count($str);
        for ($l=0; $l < $z; $l++) { 
        $ar = str_split($str[$l]);
        $a = strlen($str[$l]);
        $b = $a-1;
        $kata = $this->kata();
        $arr = str_split($kata);
        $j = strlen($kata);
        $s = $j-$a;
        $i = 0;
        while ($i <= $s) {
            $c = $b;
            for ($e=$c; $e >= 0; $e--) { 
               if ( $arr[$i+$e] ==  $ar[$e]) {
               } else {
                break;
               }
            }
            if ($e == -1) {
                $d = $d+1;
                $h[$d] = $i + $b;
                $i = $i + $a;
            }  else {
                for ($g=$e; $g >= 0 ; $g--) { 
                    if ($arr[$i+$g] <> $ar[$g])
                    {
                        $i = $i+1;
                    }
                    else{
                        break;
                    }
                    
                }
            }
        }
    }
        return $h;
    }

    public function cari(Request $request)
    {
        $search=$request['search'];
        $n = 0;
        $cari=strtolower($search);
        $h = $this->cek($cari);
        $z = count($h);
        $data3[0] = 0;
        $data = $this->lowongan->aktifData();
        $data1 = $this->lowongan->jumlah();
        for ($u=1; $u < $z; $u++) { 
            $data2 = str_replace(' ', '',  $data[0]->posisi);
                $a = strlen($data2);
            for ($i=1; $i <= $data1; $i++) {
                if ($h[$u] <= $a) {
                    $data3[$n] = $data[$i-1];
                    $n = $n + 1;
                    break;
                }
                    $data2 = str_replace(' ', '',  $data[$i]->posisi);
                    $x = strlen($data2);
                    $a = $a + $x + 1;
            }
        }
        
        $hasil =  array_values (array_map ("unserialize", array_unique (array_map ("serialize", $data3))));
        echo json_encode($hasil);
    }
}
