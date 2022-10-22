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
        return view('user/v_registerpelamar');
    }

    public function regperusahaan()
    {
        return view('perusahaan/v_registerperusahaan');
    }

    public function cpelamar(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|string|email|max:255|unique:users',
            'alamatpel' => 'required',
            'umur' => 'required|numeric',
            'ttl' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg,bpm|max:2048',
            'gender' => 'max:10',
        ],[
            'name.required'=>'Nama Wajib terisi',
            'email.required'=>'Email wajib terisi',
            'email.unique'=>'Email sudah terdaftar di database',
            'email.email'=>'Gunakan Format Email yang benar',
            'password.required'=>'Password Wajib Diisi',
            'password.confirmed'=>'Password Tidak Sama',
            'alamatpel.required'=>'Alamat Wajib Diisi',
            'umur.required'=>'Umur Wajib Diisi',
            'umur.numeric'=>'Umur Wajib Diisi dengan Angka',
            'ttl.required'=>'Tempat Tanggal Lahir Wajib Diisi',
            'foto.required'=>'Input File Foto',
            'foto.mimes'=>'Format Foto berupa png, jpg, jpeg, dan bpm',
            'gender.max'=>'Pilih Jenis Kelamin',


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
        return redirect('/')->with('register', 'Akun Pelamar Berhasil Dibuat');
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
            'ukuran' => 'max:10',
        ],[
            'name.required'=>'Nama Wajib terisi',
            'email.required'=>'Email wajib terisi',
            'email.unique'=>'Email sudah terdaftar di database',
            'email.email'=>'Gunakan Format Email yang benar',
            'password.required'=>'Password Wajib Diisi',
            'password.confirmed'=>'Terjadi perbedaan antara Password dengan Password Konfirmasi',
            'alamat.required'=>'Alamat Wajib Diisi',
            'industri.required'=>'Industri Wajib Diisi',
            'website.required'=>'Alamat Website Wajib Diisi',
            'logo.required'=>'Input File Logo Perusahaan',
            'logo.mimes'=>'Format Logo berupa png, jpg, jpeg, dan bpm',
            'logo.max'=>'Ukuran Logo tidak melebihi 2048kb',
            'ukuran.max'=>'Pilih Ukuran Perusahaan',
            'deskripsi.required'=>'Deskripsi Perusahaan Wajib Diisi',
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
        return redirect('/')->with('register', 'Akun Perusahaan Berhasil Dibuat. Silahkan Tunggu Persetujuan Verifikasi oleh Admin');
    }
}
