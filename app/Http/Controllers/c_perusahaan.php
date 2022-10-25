<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\perusahaan;
use App\Models\pelamar;
use App\Models\m_user;
use Auth;
use DB;

class c_perusahaan extends Controller
{
    public function __construct()
    {
        $this->perusahaan = new perusahaan();
        $this->pelamar = new pelamar();
        $this->m_user = new m_user();
    }

    public function index()
    {
        $data = [
            'perusahaan' => $this->perusahaan->allData(),
        ];

        return view('admin.v_perusahaan', $data);
    }

    public function lowongan()
    {
        $data = [
            'perusahaan' => $this->perusahaan->allData(),
        ];

        return view('admin.v_lowongan', $data);
    }

    public function dashboard()
    {
        $data = [
            'perusahaan' => $this->perusahaan->jumlahData(),
            'pelamar' => $this->pelamar->jumlahData(),
        ];
        return view('admin.v_admin', $data);
    }

    public function verifikasi($id)
    {
        $data = [
            'status' => 1,
        ];

        $this->m_user->editData($id, $data);
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|string|email|max:255|unique:users',
            'logo' => 'required|mimes:png,jpg,jpeg,bpm|max:2048',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'industri' => 'required',
            'website' => 'required',
            'ukuran' => 'required',
        ]);
        $level = 2;
        $name = $request->name;
        $email = $request->email;
        $data = [
            'name' => $name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $level, 
        ];
        $this->m_user->addData($data);
        $data1 = $this->m_user->nameData($email);
        $file  = $request->logo;
        $filename = "Logo".$request->email.'.'.$file->extension();
        $file->move(public_path('logo'),$filename);
        $data2 = [
            'id_perusahaan' => $data1->id,
            'logo' => $filename,
            'nama' => $name,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'industri' => $request->industri,
            'website' => $request->website,
            'ukuran' => $request->ukuran,
        ];
        $this->perusahaan->addData($data2);
        return redirect()->route('admin.perusahaan');
    }

    public function update(Request $request, $id_perusahaan)
    {
        $perusahaan = $this->perusahaan->detailData($id_perusahaan);

        unlink(public_path('logo'). '/' .$perusahaan->logo);

            $request->validate([
                'name' => 'required',
                'password' => 'required|string|min:8|confirmed',
                'email' => 'required|string|email|max:255|unique:users',
                'logo' => 'required|mimes:png,jpg,jpeg,bpm|max:2048',
                'deskripsi' => 'required',
                'alamat' => 'required',
                'industri' => 'required',
                'website' => 'required',
                'ukuran' => 'required',
            ]);
            $level = 2;
            $name = $request->name;
            $email = $request->email;
            $data = [
                'name' => $name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level' => $level, 
            ];
            $this->m_user->updateData($data);
            $data1 = $this->m_user->nameData($email);
            $file  = $request->logo;
            $filename = "Logo".$request->email.'.'.$file->extension();
            $file->move(public_path('logo'),$filename);
            $data2 = [
                'logo' => $filename,
                'nama' => $name,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'industri' => $request->industri,
                'website' => $request->website,
                'ukuran' => $request->ukuran,
            ];
            $this->perusahaan->updateData($data2);
            return redirect()->route('admin.perusahaan');
    }
    public function daftarPerusahaan()
    {
        $data = [
            'perusahaan' => $this->perusahaan->allData(),
        ];

        return view('user.v_daftarperusahaan', $data);
    }

    public function destroy($id)
    {
        $id_perusahaan = $id;
        $perusahaan = $this->perusahaan->detailData($id_perusahaan);
        unlink(public_path('logo'). '/' .$perusahaan->logo);
        $this->m_user->deleteData($id);
        $this->perusahaan->deleteData($id_perusahaan);
        return redirect()->route('admin.perusahaan');
    }

    public function Search(Request $request)
    {
        // $cari = $request->cari;
        // $data = [
        //     'lowongan' =>$this->lowongan->cariData($cari),
        // ];
        // return view('user/user',$data);
        $inputSearch=$request['inputSearch'];
        $keyResult=DB::table('perusahaans')
        ->where('nama','LIKE','%' .$inputSearch.'%')
        ->get();
        echo $keyResult;
    }

}
