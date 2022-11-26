<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class m_user extends Model
{
    use HasFactory;

    public $table = 'users';

    protected $fileable = [
        'id', 'name', 'email', 'password', 'level',
    ];

    public function addData($data)
    {
        DB::table('users')->insert($data);
    }

    public function nameData($email)
    {
        return DB::table('users')->where('email', $email)->first();
    }

    public function editData($id, $data)
    {
        DB::table('users')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        DB::table('users')->where('id', $id)->delete();
    }
    public function userData()
    {
        // return DB::table('lamarans')->join('lowongans', 'lamarans.id_lowongan', '=', 'lowongans.id_lowongan')->join('perusahaans', 'lowongans.id_perusahaan', '=', 'perusahaans.id_perusahaan')->where('id_user', Auth::user()->id)->get();
        return DB::table('users')->join('pelamars', 'users.id', '=', 'pelamars.id_user')->where('id_user', Auth::user()->id)->get();
    }
}
