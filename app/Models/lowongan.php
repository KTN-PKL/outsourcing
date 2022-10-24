<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class lowongan extends Model
{
    use HasFactory;

    public $table = 'lowongans';

    protected $fileable = [
        'id_lowongan', 'id_perusahaan', 'posisi', 'jobdesk', 'kualifikasi', 'skill'
    ];

    public function data()
    {
        return DB::table('lowongans')->get();   
    }

    public function allData()
    {
        return DB::table('lowongans')->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id_perusahaan')->get();
    }

    public function perusahaanData($id_perusahaan)
    {
        return DB::table('lowongans')->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id_perusahaan')->where('lowongans.id_perusahaan', $id_perusahaan)->get();
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

    public function cariData($cari)
    {
        return DB::table('lowongans')->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id_perusahaan')->where('posisi','like',"%".$cari."%")->get();
    }
}
