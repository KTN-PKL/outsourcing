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

    public function table(){
        $data = [
            'lowongan'=>$this->lowongan->aktifData(),
        ];
        return view('user.tablelowongan', $data);
    }

    public function kata($data1a, $data2a)
    {
        $data = $this->lowongan->filter($data1a, $data2a);
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
        foreach ($data as $data1) {
            $data2 = strtolower($data1->nama);
            $data3 = str_replace(' ', '', $data2);
            if ($kata == " ") {
                $kata = $data3;
            } else {
                $kata = $kata." ".$data3;
            }
        }
        return $kata;
    }

    public function cek($cari, $data1a, $data2a)
    {
        $str = explode(" ",$cari);
        $d = 0;
        $h[0] = 0;
        $z = count($str);
        for ($l=0; $l < $z; $l++) { 
        $ar = str_split($str[$l]);
        $a = strlen($str[$l]);
        $b = $a-1;
        $kata = $this->kata($data1a, $data2a);
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

    public function cari($cari, $data1a, $data2a){

        $n = 0;
        $h = $this->cek($cari, $data1a, $data2a);
        $z = count($h);
        $data3[0] = 0;
        $data = $this->lowongan->filter($data1a, $data2a);
        $data1 = $this->lowongan->jfilter($data1a, $data2a);
        for ($u=1; $u < $z; $u++) { 
            $data2 = str_replace(' ', '',  $data[0]->posisi);
                $a = strlen($data2);
            $data5 = str_replace(' ', '',  $data[0]->nama);
                $b = strlen($data5);
            if ($h[$u] <= $a) {
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
            if ($h[$u] > $a) {
                $k = $h[$u] - $a;
                for ($i=1; $i <= $data1; $i++) {
                    if ($k <= $b) {
                        $data3[$n] = $data[$i-1];
                        $n = $n + 1;
                        break;
                    }
                        $data5 = str_replace(' ', '',  $data[$i]->nama);
                        $x = strlen($data5);
                        $b = $b + $x + 1;
                }
            }
            
        }
        
        $hasil =  array_values (array_map ("unserialize", array_unique (array_map ("serialize", $data3))));
        // echo json_encode($hasil)
        return $hasil;
    }

    public function searchLowongan(Request $request)
    {
        $tipe = null;
        for ($i=1; $i < 5; $i++) { 
            if ($request->{"tipe".$i} <> 0) {
                if ($tipe == null) {
                    $tipe = $request->{"tipe".$i};
                } else {
                    $tipe = $tipe."++".$request->{"tipe".$i};
                }
            }
        } $data1a = explode("++",$tipe);
        $pengalaman = null;
        for ($i=1; $i < 6; $i++) { 
            if ($request->{"pengalaman".$i} <> 0) {
                if ($pengalaman == null) {
                    $pengalaman = $request->{"pengalaman".$i};
                } else {
                    $pengalaman = $pengalaman."++".$request->{"pengalaman".$i};
                }
            }
        } $data2a = explode("++",$pengalaman);
        $search=strtolower($request['search']);
        $test = $this->cari($search, $data1a, $data2a);
        if($test[0] <> null){
            $data = [
                'lowongan' =>$test,
            ];
        return view('user.tablelowongan',$data);  
        }else{
            return 
            '<center>
            <div style="font-size:24px"><i class="fa fa-times" style="color:red"></i>Lowongan Tidak Ditemukan
            </div>
            </center>';
        };
    }
}
