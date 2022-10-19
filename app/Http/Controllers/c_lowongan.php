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

    public function indexuser()
    {
        
    }

    public function indexperusahaan()
    {
        $id_perusahaan = Auth::user()->id;

        $data = [
            'lowongan' => $this->lowongan->perusahaanData($id_perusahaan),
        ];
        return view('perusahaan.v_lowongan',$data);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->Validate([
            'posisis' => 'required',
            'jobdesk' => 'required',
            'kualifikasi' => 'required',
            'skill' => 'required',
        ]);
        $data = [
            'id_perusahaan' => Auth::user()->id,
            'posisis' => $request->posisi,
            'jobdesk' => $request->jobdesk,
            'kualifikasi' => $request->kualifikasi,
            'skill' => $request->skill,
        ];
        $this->lowongan->addData($data);
        return redirect()->route('perusahaan.lowongan.index');
    }

    public function edit($id_lowongan)
    {
        $data = [
            'lowongan' =>$this->lowongan->detailData($id_lowongan),
        ];
    }

    public function update(Request $request, $id_lowongan)
    {
        $request->Validate([
            'posisis' => 'required',
            'jobdesk' => 'required',
            'kualifikasi' => 'required',
            'skill' => 'required',
        ]);
        $data = [
            'id_perusahaan' => Auth::user()->id,
            'posisis' => $request->posisi,
            'jobdesk' => $request->jobdesk,
            'kualifikasi' => $request->kualifikasi,
            'skill' => $request->skill,
        ];
        $this->lowongan->editData($id_lowongan, $data);
        return redirect()->route('perusahaan.lowongan.index');
    }

    public function delete($id_lowongan)
    {
        $this->lowongan->deleteData($id_lowongan);
        return redirect()->route('lowongan');
    }
}
