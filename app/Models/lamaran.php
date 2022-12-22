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
        'id_lamaran', 'id_perusahaan', 'id_lowongan', 'id_user', 'resume', 'no_telp','statusjadwal'
    ];

    public function userData()
    {
        return DB::table('lamarans')->join('lowongans', 'lamarans.id_lowongan', '=', 'lowongans.id_lowongan')->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id_perusahaan')->where('id_user', Auth::user()->id)->get();
    }

    public function perusahaanData()
    {
        return DB::table('lamarans')->join('users', 'lamarans.id_user' ,'=', 'users.id')->join('lowongans', 'lamarans.id_lowongan', '=', 'lowongans.id_lowongan')->join('pelamars', 'lamarans.id_user', '=', 'pelamars.id_pelamar')->where('lamarans.id_perusahaan', Auth::user()->id)->paginate(8);
    }

    public function lulusData()
    {
        return DB::table('lamarans')->join('lowongans', 'lamarans.id_lowongan', '=', 'lowongans.id_lowongan')->join('pelamars', 'lamarans.id_user', '=', 'pelamars.id_pelamar')->where('lamarans.id_perusahaan', Auth::user()->id)->where('lamarans.status', "Lulus")->orwhere('lamarans.status', "Diterima")->paginate(8);
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

    public function editDatau($id_user, $data)
    {
        DB::table('lamarans')->where('id_user', $id_user)->update($data);
    }

    public function notifstatus()
    {
        return DB::table('lamarans')->where('id_user', Auth::user()->id)->where('notifstatus', 'new')->count();
    }

    public function notifwawancara()
    {
        return DB::table('lamarans')->where('id_user', Auth::user()->id)->where('notifwawancara', 'new')->count();
    }

    public function deleteData($id_lamaran)
    {
        DB::table('lamarans')->where('id_lamaran', $id_lamaran)->delete();
    }
    public function cekdata($id_lowongan, $id_user)
    {
        return DB::table('lamarans')->where('id_lowongan', $id_lowongan)->where('id_user', $id_user)->count();
    }
    public function jumlah()
    {
        return DB::table('lamarans')->where('id_perusahaan', Auth::user()->id)->count();
    }

    public function lowonganData($id_lowongan)
    {
        return DB::table('lamarans')->join('lowongans', 'lamarans.id_lowongan', '=', 'lowongans.id_lowongan')->join('pelamars', 'lamarans.id_user', '=', 'pelamars.id_pelamar')->where('lamarans.id_lowongan', $id_lowongan)->where('lamarans.status', "Lulus")->get();
    }
}
