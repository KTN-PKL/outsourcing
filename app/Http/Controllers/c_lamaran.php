<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lamaran;
use Auth;

class c_lamaran extends Controller
{
    public function __construct()
    {
        $this->lamaran = new lamaran();
    }

    public function index()
    {
        // $data = [
        //     'lamaran' => $this->lamaran->allData(),
        // ];
        if (Auth::user()->level == '3') {
            $lamaran = [
                'lamaran' => $this->pekerjaan->userData(),
                  ];
          
            return view('user.v_lamaranSaya', $lamaran);
        } elseif (Auth::user()->level == '2') {
            $pekerjaan = [
                'lamaran' => $this->lamaran->allData(),
            ];
          
            return view('perusahaan.v_lamaran', $lamaran);
        }
        return view('user.v_lamaran');
    }

    public function create(Request $request)
    {
       
        $request->validate([
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
