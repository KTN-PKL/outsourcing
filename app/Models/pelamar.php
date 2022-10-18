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
        'id_pelamar', 'id_perusahaan', 'posisi', 'jobdesk', 'kualifikasi', 'skill'
    ];

}
