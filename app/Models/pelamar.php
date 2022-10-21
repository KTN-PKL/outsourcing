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

    public function jumlahData()
    {
        return DB::table('pelamars')->count();
    }
}
