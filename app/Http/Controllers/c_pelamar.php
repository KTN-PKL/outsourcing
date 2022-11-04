<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pelamar;
use App\Models\m_user;
use Auth;

class c_pelamar extends Controller
{
    public function __construct()
    {
        $this->pelamar = new pelamar();
        $this->m_user = new m_user();
    }

    public function index()
    {
        $data = [
            'pelamar' => $this->pelamar->pelamarData(Auth::user()->id),
        ];
        return view('user.v_editProfil', $data);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'alamatpel' => 'required',
            'umur' => 'required|numeric',
            'ttl' => 'required',
            'foto' => 'mimes:png,jpg,jpeg,bpm|max:2048',
            'gender' => 'max:10',
        ],[
            'name.required'=>'Nama Wajib terisi',
            'alamatpel.required'=>'Alamat Wajib Diisi',
            'umur.required'=>'Umur Wajib Diisi',
            'umur.numeric'=>'Umur Wajib Diisi dengan Angka',
            'ttl.required'=>'Tempat Tanggal Lahir Wajib Diisi',
            'foto.required'=>'Input File Foto',
            'foto.mimes'=>'Format Foto berupa png, jpg, jpeg, dan bpm',
            'gender.max'=>'Pilih Jenis Kelamin',
        ]);
        $id = Auth::user()->id;
        $name = $request->name;
        $data = [
            'name' => $name,
        ];
        $this->m_user->editData($id, $data);
        $pelamar = $this->pelamar->pelamarData($id);
        if ($request->foto <> null) {
        $file  = $request->foto;
        $filename = "Foto".$pelamar->email.'.'.$file->extension();
        $file->move(public_path('foto'),$filename);
        $data2 = [
            'namapel' => $name,
            'umur' => $request->umur,
            'gender' => $request->gender,
            'ttl' => $request->ttl,
            'alamatpel' => $request->alamatpel,
            'foto' => $filename,
        ];
        } else {
            $data2 = [
                'namapel' => $name,
                'umur' => $request->umur,
                'gender' => $request->gender,
                'ttl' => $request->ttl,
                'alamatpel' => $request->alamatpel,
            ];
        }
        $this->pelamar->editData($id, $data2);
        return redirect()->back()->with('update','Berhasil Update Profil');
    }
}
