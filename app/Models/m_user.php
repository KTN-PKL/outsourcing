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
        'id', 'name', 'email', 'password', 'level', 'status'
    ];

    public function addData()
    {
        DB::table('users')->insert($data);
    }

    public function nameData($name)
    {
        DB::table('users')->where('name', $name)->first();
    }
}
