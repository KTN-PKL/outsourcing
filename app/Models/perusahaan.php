<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class perusahaan extends Model
{
    use HasFactory;

    public $table = 'perusahaans';

    protected $fileable = [
        'id_perusahaan', 'logo', 'nama', 'deskripsi', 'alamat', 'industri', 'website', 'ukuran'
    ];

    public function allData()
    {
        return DB::table('perusahaans')->join('users','perusahaans.id_perusahaan','=','users.id')->get();
    }

    public function userData()
    {
        return DB::table('perusahaans')->where('id_perusahaan', Auth::user()->id)->first();
    }

    public function addData($data2)
    {
        DB::table('perusahaans')->insert($data2);
    }

    public function detailData($id_perusahaan)
    {
        return DB::table('perusahaans')->where('id_perusahaan', $id_perusahaan)->first();
    }

    public function editData($id_perusahaan, $data2)
    {
        DB::table('perusahaans')->where('id_perusahaan', $id_perusahaan)->update($data2);
    }

    public function deleteData($id_perusahaan)
    {
        DB::table('perusahaans')->where('id_perusahaan', $id_perusahaan)->delete();
    }
}
