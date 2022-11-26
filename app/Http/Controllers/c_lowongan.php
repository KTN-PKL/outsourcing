<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lowongan;
use Illuminate\Support\Facades\Crypt;
use Auth;
use Carbon\Carbon;

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
            'tipe' => 'required',
            'posisi' => 'required',
            'jobdesk' => 'required',
            'kualifikasi' => 'required',
            'skill' => 'required',
            'pengalaman' => 'required',
        ],[
            'tipe.required'=>'Tipe Pekerjaan Wajib terisi',
            'posisi.required'=>'Posisi Wajib terisi',
            'jobdesk.required'=>'Jobdesk wajib terisi',
            'kualifikasi.required'=>'Kualifikasi Wajib terisi',
            'skill.required'=>'Skill wajib terisi',
        ]);
        $skill = $request->skill;
        if ($request->jumlah <> 1) {
            for ($i=1; $i < $request->jumlah ; $i++) { 
                $skill = $skill."+".$request->{"skill".$i};
            }
        }
        $current_date_time = Carbon::now(); 
        $data = [
        'id_perusahaan' => Auth::user()->id,
        'statuslowongan'=> 'Aktif',
        'tipe' => $request->tipe,
        'posisi' => $request->posisi,
        'jobdesk' => $request->jobdesk,
        'kualifikasi' => $request->kualifikasi,
        'skill' => $skill,
        'pengalaman' => $request->pengalaman,
        'waktu'=> $current_date_time,
        ];
        if($request->statusgaji <> null){
            $data['gaji'] = $request->gaji;
            $data['statusgaji'] = "Tampilkan";
        }else{
            $data['statusgaji'] = "Sembunyikan";
        }
        if($request->statustnk <> null){
            $data['benefit'] = $request->benefit;
            $data['statustnk'] = "Tampilkan";
        }else{
            $data['statustnk'] = "Sembunyikan";
        }
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
            'tipe' => 'required',
            'posisi' => 'required',
            'jobdesk' => 'required',
            'kualifikasi' => 'required',
            'skill' => 'required',
            'pengalaman' => 'required',
        ],[
            'tipe.required'=>'Tipe Pekerjaan Wajib terisi',
            'posisi.required'=>'Posisi Wajib terisi',
            'jobdesk.required'=>'Jobdesk wajib terisi',
            'kualifikasi.required'=>'Kualifikasi Wajib terisi',
            'skill.required'=>'Skill wajib terisi',
        ]);
        $skill = $request->skill;
        if ($request->jumlah <> 1) {
            for ($i=1; $i < $request->jumlah ; $i++) { 
                $skill = $skill."+".$request->{"skill".$i};
            }
        }
        $current_date_time = Carbon::now(); 
        $data = [
        'statuslowongan'=> 'Aktif',
        'tipe' => $request->tipe,
        'posisi' => $request->posisi,
        'jobdesk' => $request->jobdesk,
        'kualifikasi' => $request->kualifikasi,
        'skill' => $skill,
        'pengalaman' => $request->pengalaman,
        'waktu'=> $current_date_time,
        ];
        if($request->statusgaji <> null){
            $data['gaji'] = $request->gaji;
            $data['statusgaji'] = "Tampilkan";
        }else{
            $data['statusgaji'] = "Sembunyikan";
        }
        if($request->statustnk <> null){
            $data['benefit'] = $request->benefit;
            $data['statustnk'] = "Tampilkan";
        }else{
            $data['statustnk'] = "Sembunyikan";
        }
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


    public function dataperusahaan($id_perusahaan)
    {
        $data = [
            'lowongan' => $this->lowongan->perusahaanData($id_perusahaan),
        ];
        return view('user/v_lowonganperusahaan', $data);
    }

    public function lowonganAktif($id_lowongan)
    {
        $status = "Aktif";
        $data = [
            'statuslowongan' => $status,
        ];
        $this->lowongan->editData($id_lowongan, $data);
        return redirect()->back();
    }
    public function lowonganNonaktif($id_lowongan)
    {
        $status = "Non-Aktif";
        $data = [
            'statuslowongan' => $status,
        ];
        $this->lowongan->editData($id_lowongan, $data);
        return redirect()->back();
    }
}
