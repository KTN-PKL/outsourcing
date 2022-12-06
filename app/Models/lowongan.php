<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class lowongan extends Model
{
    use HasFactory;

    public $table = 'lowongans';

    protected $fillable = [
        'id_lowongan', 'id_perusahaan','statuslowongan','tipe', 'posisi', 'jobdesk', 'kualifikasi', 'skill','gaji','benefit','pengalaman','statusgaji','created_at'
    ];

    public function data()
    {
        return DB::table('lowongans')->get();   
    }

    public function allData()
    {
        return DB::table('lowongans')->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id_perusahaan')->paginate(8);
    }

    public function aktifData()
    {
        return DB::table('lowongans')->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id_perusahaan')->where('lowongans.statuslowongan', 'Aktif')->paginate(8);
    }

    public function perusahaanData($id_perusahaan)
    {
        return DB::table('lowongans')->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id_perusahaan')->where('lowongans.id_perusahaan', $id_perusahaan)->paginate(8);
    }

    public function jumlahLowongan($id_perusahaan)
    {
        return DB::table('lowongans')->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id_perusahaan')->where('lowongans.id_perusahaan', $id_perusahaan)->count();
    }

    public function addData($data)
    {
        DB::table('lowongans')->insert($data);
    }

    public function detailData($id_lowongan)
    {
        return DB::table('lowongans')->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id_perusahaan')->where('id_lowongan', $id_lowongan)->first();
    }

    public function editData($id_lowongan, $data)
    {
        DB::table('lowongans')->where('id_lowongan', $id_lowongan)->update($data);
    }

    public function deleteData($id_lowongan)
    {
        DB::table('lowongans')->where('id_lowongan', $id_lowongan)->delete();
    }

    public function jumlah()
    {
        return DB::table('lowongans')->count();
    }

    public function filter($data1, $data2)
    {
            return DB::table('lowongans')->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id_perusahaan')
            ->when($data1, function($queri, $data1) {
                if ($data1[0] <> null) {
                    $queri->where('tipe', $data1[0]);
                    $j = count($data1);
                    $j = $j - 1;
                    for ($i=0; $i < $j;) { 
                        $i = $i + 1;
                        $queri->orWhere('tipe', $data1[$i]); 
                    }
                }
            })
            ->when($data2, function($queri, $data2) {
                if ($data2[0] <> null) {
                    $queri->where('pengalaman', $data2[0]);
                    $j = count($data2);
                    $j = $j - 1;
                    for ($i=0; $i < $j;) { 
                        $i = $i + 1;
                        $queri->orWhere('pengalaman', $data2[$i]); 
                    }
                }
            })->get();
    }
}
