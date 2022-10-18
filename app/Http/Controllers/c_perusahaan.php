<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\perusahaan;
use Auth;

class c_perusahaan extends Controller
{
    public function __construct()
    {
        $this->perusahaan = new perusahaan();
    }

    public function index()
    {
        $perusahaan = $this->perusahaan->userData();
        if ($perusahaan->nama <> "") {
            if (Auth::user()->status == 1) {
            $data = [
                'perusahaan' =>  $perusahaan,
            ];
            //view di acc
         } else {
            //view belum diacc
         }
        } else {
            return redirect()->route('perusahaan.create');
        }
    }

    public function create()
    {
        return view('perusahaan/v_create');
    }

    public function store(Request $request)
    {
        $request->Validate([
            'logo' => 'required|mimes:png,jpg,jpeg,bpm|max:2048',
            'nama' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'industri' => 'required',
            'website' => 'required',
            'ukuran' => 'required',
        ]);
            $file  = $request->logo;
            $filename = "Logo".Auth::user()->name.'.'.$file->extension();
            $file->move(public_path('logo'),$filename);
            $data = [
                'id' => Auth::user()->id,
                'logo' => $filename,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'industri' => $request->industri,
                'website' => $request->website,
                'ukuran' => $request->ukuran,
            ];
            $this->perusahaan->addData($data);

    }

    public function edit($id_perusahaan)
    {
        $data = [
            'perusahaan' => $this->perusahaan->detailData($id_perusahaan),
        ];
    }

    public function update(Request $request, $id_perusahaan)
    {
        $perusahaan = $this->perusahaan->detailData($id_perusahaan);

        unlink(public_path('logo'). '/' .$perusahaan->logo);

        $request->Validate([
            'logo' => 'required|mimes:png,jpg,jpeg,bpm|max:2048',
            'nama' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'industri' => 'required',
            'website' => 'required',
            'ukuran' => 'required',
        ]);
            $file  = $request->logo;
            $filename = "Logo".Auth::user()->name.'.'.$file->extension();
            $file->move(public_path('logo'),$filename);
            $data = [
                'id' => Auth::user()->id,
                'logo' => $filename,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'industri' => $request->industri,
                'website' => $request->website,
                'ukuran' => $request->ukuran,
            ];
            $this->perusahaan->editData($id_perusahaan, $data);
    }

}
