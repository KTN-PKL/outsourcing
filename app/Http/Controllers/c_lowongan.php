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

    public function indexadmin($id_perusahaan)
    {
        $data = [
            'lowongan' => $this->lowongan->perusahaanData($id_perusahaan),
        ];
        return view('admin.v_lowonganperusahaan',$data);
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
        return view('perusahaan.v_createlowongan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'posisi' => 'required',
            'jobdesk' => 'required',
            'kualifikasi' => 'required',
            'skill' => 'required',
        ],[
            'posisi.required'=>'Posisi Wajib terisi',
            'jobdesk.required'=>'Jobdesk wajib terisi',
            'kualifikasi.required'=>'Kualifikasi Wajib terisi',
            'skill.required'=>'Skill wajib terisi',
        ]);
        $data = [
            'id_perusahaan' => Auth::user()->id,
            'posisi' => $request->posisi,
            'jobdesk' => $request->jobdesk,
            'kualifikasi' => $request->kualifikasi,
            'skill' => $request->skill,
        ];
        $this->lowongan->addData($data);
        return redirect()->route('perusahaan.lowongan.index')->with('create', 'Lowongan Berhasil Dibuat');
    }

    public function edit($id_lowongan)
    {
        $data = [
            'lowongan' =>$this->lowongan->detailData($id_lowongan),
        ];
        return view('perusahaan.v_editlowongan', $data);
    }

    public function update(Request $request, $id_lowongan)
    {
        $request->validate([
            'posisi' => 'required',
            'jobdesk' => 'required',
            'kualifikasi' => 'required',
            'skill' => 'required',
        ]);
        $data = [
            'id_perusahaan' => Auth::user()->id,
            'posisi' => $request->posisi,
            'jobdesk' => $request->jobdesk,
            'kualifikasi' => $request->kualifikasi,
            'skill' => $request->skill,
        ];
        $this->lowongan->editData($id_lowongan, $data);
        return redirect()->route('perusahaan.lowongan.index')->with('edit', 'Lowongan Berhasil Diupdate');
    }

    public function destroy($id_lowongan)
    {
        $this->lowongan->deleteData($id_lowongan);
        return redirect()->route('perusahaan.lowongan.index')->with('delete', 'Lowongan Berhasil Dihapus');
    }

    public function detailLowongan($id_lowongan)
    {
        $data = [
            'lowongan' =>$this->lowongan->detailData($id_lowongan),
        ];
        return view('user/v_jobdetail',$data);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $data = [
            'lowongan' =>$this->lowongan->cariData($cari),
        ];
        return view('user/user',$data);
    }

    public function dataperusahaan($id_perusahaan)
    {
        $data = [
            'lowongan' => $this->lowongan->perusahaanData($id_perusahaan),
        ];
        return view('user/v_lowonganperusahaan', $data);
    }
}
