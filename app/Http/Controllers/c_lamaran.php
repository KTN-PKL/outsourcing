<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lowongan;
use Auth;

class c_lamaran extends Controller
{
    public function __construct()
    {
        $this->lowongan = new lowongan();
    }

    public function create(Request $request)
    {
        $request->Validate([
            'posisis' => 'required',
            'jobdesk' => 'required',
            'kualifikasi' => 'required',
            'skill' => 'required',
        ]);
    }
}
