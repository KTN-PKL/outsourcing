<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lowongan;
use Auth;

class c_lowongan extends Controller
{
    public function __construct()
    {
        $this->lowongan = new lowongan();
    }

    public function index()
    {
        
    }
}
