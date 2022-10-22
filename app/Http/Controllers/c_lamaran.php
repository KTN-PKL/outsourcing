<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lamaran;
use App\Models\pelamar;
use Auth;

class c_lamaran extends Controller
{
    public function __construct()
    {
        $this->lamaran = new lamaran();
        $this->pelamar = new pelamar();
    }

    public function index()
    {
        // $data = [
        //     'lamaran' => $this->lamaran->allData(),
        // ];
        if (Auth::user()->level == '3') {
            $lamaran = [
                'lamaran' => $this->lamaran->userData(),
                  ];
          
            return view('user.v_lamaranSaya', $lamaran);
        } elseif (Auth::user()->level == '2') {
            $lamaran = [
                'lamaran' => $this->lamaran->perusahaanData(),
            ];
          
            return view('perusahaan.v_pelamar', $lamaran);
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
        return redirect()->back()->with('create', 'Lamaran Berhasil Dikirim');
    }

    public function lulus($id_lamaran)
    {
        $status = "Lulus";
        $data = [
            'status' => $status,
        ];
        $this->lamaran->editData($id_lamaran, $data);
        return redirect()->back();
    }

    public function tidaklulus($id_lamaran)
    {
        $status = "Tidak Lulus";
        $data = [
            'status' => $status,
        ];
        $this->lamaran->editData($id_lamaran, $data);
        return redirect()->back();
    }

    public function datalulus()
    {
        $data = [
            'lamaran' => $this->lamaran->lulusData(),
        ];
        return view('perusahaan.v_lamaranlulus', $data);
    }

    public function downloadcv($resume)
    {
        return response()->download(public_path('resume').'/'.$resume);
    }

    public function dashboard()
    {
        $data = [
            'pelamar' => $this->pelamar->jumlahData(),
        ];
        return view('perusahaan.v_perusahaan', $data);
    }
}
