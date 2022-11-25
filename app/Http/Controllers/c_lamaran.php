<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lamaran;
use App\Models\pelamar;
use App\Models\lowongan;
use Auth;

class c_lamaran extends Controller
{
    public function __construct()
    {
        $this->lamaran = new lamaran();
        $this->lowongan = new lowongan();
        $this->pelamar = new pelamar();
    }

    public function index()
    {
        // $data = [
        //     'lamaran' => $this->lamaran->allData(),
        // ];
        if (Auth::user()->level == '3') {
            return view('user.v_lamaranSaya');
        } elseif (Auth::user()->level == '2') {
            $lamaran = [
                'lamaran' => $this->lamaran->perusahaanData(),
            ];
          
            return view('perusahaan.v_pelamar', $lamaran);
        }
        return view('user.v_lamaran');
    }

    public function lamaran()
    {
        $lamaran = [
            'lamaran' => $this->lamaran->userData(),
              ];
      
        return view('user.v_lamaran', $lamaran);
    }
    public function wawancara()
    {
        $lamaran = [
            'lamaran' => $this->lamaran->userData(),
              ];
      
        return view('user.v_wawancara', $lamaran);
    }

    public function create(Request $request, $id_lowongan)
    {
        $id_user = Auth::user()->id;
        $cek = $this->lamaran->cekdata($id_lowongan, $id_user);
        if ($cek <> 0) {
            return redirect()->back()->with('eror', 'Anda Sudah pernah Mengirim Lamaran Ke Lowongan ini Silakan Cek lamaran Anda');
        } else {
            $perusahan = $this->lowongan->detailData($id_lowongan);
            $id_perusahaan = $perusahan->id_perusahaan;
            $request->validate([
                'resume' => 'required|mimes:pdf|max:3000',
                'telp' => 'required',
            ]);
            
            $file = $request->resume;
            $fileName = Auth::user()->email. $id_lowongan.'.'. $file->extension();
            $file->move(public_path('resume'),$fileName);
    
            $data = [
                'id_perusahaan' => $id_perusahaan,
                'id_lowongan' => $id_lowongan,
                'id_user' => $id_user,
                'resume' => $fileName,
                'no_telp' => $request->telp,
            ];
    
            $this->lamaran->addData($data);
            
            $lamaran = [
                'lamaran' => $this->lamaran->userData(),
                  ];
            return view('user.v_lamaranSaya', $lamaran)->with('create', 'Lamaran Berhasil Dikirim');
        }
        
    }

    public function newnotifstatus($id_lamaran)
    {
        $data = [
            'notifstatus' => "new",
        ];
        $this->lamaran->editData($id_lamaran, $data);
    }

    public function newnotifwawancara($id_lamaran)
    {
        $data = [
            'notifwawancara' => "new",
        ];
        $this->lamaran->editData($id_lamaran, $data);
    }

    public function bacastatus()
    {
        $data = [
            'notifstatus' => "read",
        ];
        $this->lamaran->editDatau(Auth::user()->id, $data);
    }

    public function read()
    {
        $status = $this->lamaran->notifstatus();
        $wawancara = $this->lamaran->notifwawancara();
        $data = $status + $wawancara;
        return $data;
    }

    public function wawancaranotif()
    {
        $data = $this->lamaran->notifwawancara(); 
        return $data;
    }

    public function bacawawancara()
    {
        $data = [
            'notifwawancara' => "read",
        ];
        $this->lamaran->editDatau(Auth::user()->id, $data);
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

    public function terima($id_lamaran)
    {
        $status = "Diterima";
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
            'lamaran' => $this->lamaran->jumlah(),
        ];
        return view('perusahaan.v_perusahaan', $data);
    }
}
