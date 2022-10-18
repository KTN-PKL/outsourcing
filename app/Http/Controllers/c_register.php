<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\perusahaan;
use App\Models\pelamar;
use App\Models\m_user;


class c_register extends Controller
{
    public function __construct()
    {
        $this->perusahaan = new perusahaan();
        $this->pelamar = new pelamar();
        $this->m_user = new m_user();
    }

    public function regpelamar()
    {
        
    }

    public function regperusahaan()
    {
        
    }

    public function cpelamar(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|string|email|max:255|unique:users',
            'alamatpel' => 'required',
            'umur' => 'required',
            'ttl' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg,bpm|max:2048',
            'gender' => 'required',
        ]);
        $level = 3;
        $name = $request->name;
        $email= $request->email;
        $data = [
            'name' => $name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $level, 
        ];
        $this->m_user->addData($data);
        $data1 = $this->m_user->nameData($email);
        $file  = $request->foto;
        $filename = "Logo".$request->email.'.'.$file->extension();
        $file->move(public_path('foto'),$filename);
        $data2 = [
            'id_pelamar' => $data1->id,
            'namapel' => $name,
            'umur' => $request->umur,
            'gender' => $request->gender,
            'ttl' => $request->ttl,
            'alamatpel' => $request->alamatpel,
            'foto' => $filename,
        ];
        $this->pelamar->addData($data2);
        return redirect('/');
    }

    public function cperusahaan(Request $request)
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
        return redirect('/');
    }
}
