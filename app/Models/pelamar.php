<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pelamar extends Model
{
    use HasFactory;

    public $table = 'pelamars';

    protected $fileable = [
        'id_pelamar', 'namapel', 'umur', 'gender', 'ttl', 'alamatpel', 'foto'
    ];

    public function addData($data2)
    {
        DB::table('pelamars')->insert($data2);
    }

    public function pelamarData($id_pelamar)
    {
        return DB::table('pelamars')->join('users', 'pelamars.id_pelamar', '=', 'users.id')->where('id_pelamar', $id_pelamar)->first(); 
    }

    public function jumlahData()
    {
        return DB::table('pelamars')->count();
    }

    public function editData($id_pelamar, $data2)
    {
        DB::table('pelamars')->where('id_pelamar', $id_pelamar)->update($data2);
    }
}
