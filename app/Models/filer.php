<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class filer extends Model
{
    use HasFactory;

    public function jesnispekerjaan($data)
    {
            return DB::table('lowongans')->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id_perusahaan')->when($data, function($queri, $data) {
                $queri->where('tipe', $data[0]);
                $j = count($data);
                $j = $j - 1;
                for ($i=0; $i < $j;) { 
                    $i = $i + 1;
                    $queri->orWhere('tipe', $data[i]); 
                }
            })->get();
    }
    public function pengalamanpekerjaan($data)
    {
            return DB::table('lowongans')->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id_perusahaan')->when($data, function($queri, $data) {
                $queri->where('pengalaman', $data[0]);
                $j = count($data);
                $j = $j - 1;
                for ($i=0; $i < $j;) { 
                    $i = $i + 1;
                    $queri->orWhere('pengalaman', $data[i]); 
                }
            })->get();
    }
    public function filter($data1, $data2)
    {
            return DB::table('lowongans')->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id_perusahaan')
            ->when($data1, function($queri, $data1) {
                if ($data1 <> null) {
                    $queri->where('tipe', $data1[0]);
                    $j = count($data1);
                    $j = $j - 1;
                    for ($i=0; $i < $j;) { 
                        $i = $i + 1;
                        $queri->orWhere('tipe', $data1[i]); 
                    }
                }
            })
            ->when($data2, function($queri, $data2) {
                if ($data2 <> null) {
                    $queri->where('pengalaman', $data2[0]);
                    $j = count($data);
                    $j = $j - 1;
                    for ($i=0; $i < $j;) { 
                        $i = $i + 1;
                        $queri->orWhere('pengalaman', $data[i]); 
                    }
                }
            })->get();
    }
}
