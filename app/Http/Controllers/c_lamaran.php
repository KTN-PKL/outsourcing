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

    public function index()
    {
        $data = [
            'lamaran' => $this->lamaran->allData(),
        ];
        return view('user.v_lamaran');
    }

    public function create(Request $request)
    {
        $request->Validate([
            'resume' => 'required|mimes:pdf|max:3000',
            'telp' => 'required',
        ]);

        $id_lowongan = $request->id_lowongan;
        $file = $request->resume;
        $fileName = Auth::user()->email. $id_lowongan.'.'. $file->extension();
        $file->move(public_path('resume'),$fileName);

        $data = [
            'id_perusahaan' => $request->id_perusahaan,
            'id_lowongan' => $id_lowongan,
            'id_user' => Auth::user()->id,
            'resume' => $fileName,
            'no_telp' => $request->telp,
        ];

        $this->lamaran->addData($data);
        return redirect()->back();
    }
}
