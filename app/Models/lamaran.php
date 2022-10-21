<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use auth;

class lamaran extends Model
{
    use HasFactory;

    use HasFactory;

    public $table = 'lamarans';

    protected $fileable = [
        'id_lamaran', 'id_perusahaan', 'id_lowongan', 'id_user', 'resume', 'no_telp'
    ];

    public function userData()
    {
        return DB::table('lamarans')->join('lowongans', 'lamarans.id_lowongan', '=', 'lowongans.id_lowongan')->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id_perusahaan')->where('id_user', Auth::user()->id)->get();
    }

    public function perusahaanData()
    {
        return DB::table('lamarans')->join('lowongans', 'lamarans.id_lowongan', '=', 'lowongans.id_lowongan')->where('lamarans.id_perusahaan', Auth::user()->id)->get();
    }

    public function addData($data)
    {
        DB::table('lamarans')->insert($data);
    }

    public function detailData($id_lamaran)
    {
        return DB::table('lamarans')->join('perusahaans', 'lamarans.id_perusahaan', '=', 'perusahaans.id_perusahaan')->where('id_lamaran', $id_lamaran)->frist();
    }

    public function editData($id_lamaran, $data)
    {
        DB::table('lamarans')->where('id_lamaran', $id_lamaran)->update($data);
    }

    public function deleteData($id_lamaran)
    {
        DB::table('lamarans')->where('id_lamaran', $id_lamaran)->delete();
    }
}
