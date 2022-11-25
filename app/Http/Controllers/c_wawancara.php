<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lowongan;
use App\Models\lamaran;
use Auth;

class c_wawancara extends Controller
{
    public function __construct()
    {
        $this->lowongan = new lowongan();
        $this->lamaran = new lamaran();
    }

    public function index()
    {
        $id_perusahaan = Auth::user()->id;
        $data = [
            'lowongan' => $this->lowongan->perusahaanData($id_perusahaan),
        ];
        return view('perusahaan.v_wawancara', $data);
    }

    // public function link(Request $request, $id_lamaran)
    // {
    //     if ($request->tipewawancara == "Offline")
    //     {
    //     $data = [
    //         'tipewawancara' => $request->tipewawancara,
    //         'alamatwawancara'=>$request->alamatwawancara
    //     ];
    //      }else{
    //     $data = [
    //         'tipewawancara'=> $request->tipewawancara,
    //         'linkwawancara'=>$request->linkwawancara
    //     ];
    //     }

    //     $this->lamaran->editData($id_lamaran, $data);
    //     return redirect()->back();
    // }

    public function jadwal($id_lowongan)
    {
        $data = [
            'lamaran' => $this->lamaran->lowonganData($id_lowongan),
            'id' => $id_lowongan,
        ];
        return view('perusahaan.v_jadwalwawancara', $data);
    }

    public function simpan(Request $request, $id)
    {
        $lamran = $this->lamaran->lowonganData($id);
        foreach ($lamran as $lamaran) {
            
            $id_lamaran = $lamaran->id_lamaran;
            $input = $request->{"tanggal".$id_lamaran}."++".$request->{"mulai".$id_lamaran}."++".$request->{"selesai".$id_lamaran}; 
            $data = [
                'jadwal' => $input,
                'statusjadwal' => "Sudah Dikirim",
                'tipewawancara' => $request->{"tipewawancara".$id_lamaran},
                'linkwawancara'=>$request->{"linkwawancara".$id_lamaran},
                'alamatwawancara'=>$request->{"alamatwawancara".$id_lamaran},
            ];
            
            $this->lamaran->editData($id_lamaran, $data);
        }
        return redirect()->back();
    }
}
