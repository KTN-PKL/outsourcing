<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\perusahaan;
use App\Models\pelamar;
use App\Models\m_user;
use App\Models\lowongan;
use Auth;
use DB;

class c_perusahaan extends Controller
{
    public function __construct()
    {
        $this->perusahaan = new perusahaan();
        $this->pelamar = new pelamar();
        $this->m_user = new m_user();
        $this->lowongan = new lowongan();
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

    public function verifikasi($id_perusahaan)
    {
        $data2 = [
            'verifikasi' => 1,
        ];

        $this->perusahaan->editData($id_perusahaan, $data2);
        return redirect()->back()->with('verified', 'Perusahaan Terverifikasi');
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
        ],[
            'name.required'=>'Nama Wajib terisi',
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

    public function read()
    {
        $perusahaan = $this->perusahaan->detailData(Auth::user()->id);
        $data = $perusahaan->verifikasi;
        return $data;
    }

     public function update(Request $request, $id_perusahaan)
    {
        $perusahaan = $this->perusahaan->detailData($id_perusahaan);

            $request->validate([
                'name' => 'required',
                'logo' => 'mimes:png,jpg,jpeg,bpm|max:2048',
                'deskripsi' => 'required',
                'alamat' => 'required',
                'industri' => 'required',
                'website' => 'required',
                'ukuran' => 'required',
            ]);
            
            $name = $request->name;
            $email = $request->email;
            if($request->password <> null)
            {
                $data = [
                'name' => $name,
                'password'=> Hash::make($request->password),
                        ];
            }else{ 
                $data = [
                'name' => $name,
                        ];
            }
            $this->m_user->editData($id_perusahaan, $data);

            $data1 = $this->m_user->nameData($email);
            if ($request->logo <> "") {
                unlink(public_path('logo'). '/' .$perusahaan->logo);
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
            } else {
                $data2 = [
                    'nama' => $name,
                    'deskripsi' => $request->deskripsi,
                    'alamat' => $request->alamat,
                    'industri' => $request->industri,
                    'website' => $request->website,
                    'ukuran' => $request->ukuran,
                ];
            }
            $this->perusahaan->editData($id_perusahaan, $data2);
            return redirect()->route('admin.perusahaan');
    }
     
    // public function update(Request $request, $id_perusahaan)
    // {
    //     $perusahaan = $this->perusahaan->detailData($id_perusahaan);

    //         $request->validate([
    //             'name' => 'required',
    //             'logo' => 'mimes:png,jpg,jpeg,bpm|max:2048',
    //             'deskripsi' => 'required',
    //             'alamat' => 'required',
    //             'industri' => 'required',
    //             'website' => 'required',
    //             'ukuran' => 'required',
    //         ]);
    //         $name = $request->name;
    //         $email = $request->email;
    //         $data = [
    //             'name' => $name,
    //         ];
    //         $this->m_user->editData($id_perusahaan, $data);
    //         $data1 = $this->m_user->nameData($email);
    //         if ($request->logo <> "") {
    //             unlink(public_path('logo'). '/' .$perusahaan->logo);
    //             $file  = $request->logo;
    //             $filename = "Logo".$request->email.'.'.$file->extension();
    //             $file->move(public_path('logo'),$filename);
    //             $data2 = [
    //                 'logo' => $filename,
    //                 'nama' => $name,
    //                 'deskripsi' => $request->deskripsi,
    //                 'alamat' => $request->alamat,
    //                 'industri' => $request->industri,
    //                 'website' => $request->website,
    //                 'ukuran' => $request->ukuran,
    //             ];
    //         } else {
    //             $data2 = [
    //                 'nama' => $name,
    //                 'deskripsi' => $request->deskripsi,
    //                 'alamat' => $request->alamat,
    //                 'industri' => $request->industri,
    //                 'website' => $request->website,
    //                 'ukuran' => $request->ukuran,
    //             ];
    //         }
    //         $this->perusahaan->editData($id_perusahaan, $data2);
    //         return redirect()->route('admin.perusahaan');
    // }
    public function daftarPerusahaan()
    {
        $data = [
            'perusahaan' => $this->perusahaan->allData(),
        ];

        return view('user.v_daftarperusahaan', $data);
    }
    public function readHitung($id)
    {
        $perusahaan = $this->lowongan->jumlahLowongan($id);
        return $perusahaan;
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

    public function kata()
    {
        $data = $this->perusahaan->allData();
        $kata = " ";
        foreach ($data as $data1) {
            $data2 = strtolower($data1->nama);
            $data3 = str_replace(' ', '', $data2);
            if ($kata == " ") {
                $kata = $data3;
            } else {
                $kata = $kata." ".$data3;
            }
        }
        return $kata;
    }

    public function cek($cari)
    {
        $str = explode(" ",$cari);
        $d = 0;
        $h[0] = 0;
        $z = count($str);
        for ($l=0; $l < $z; $l++) { 
        $ar = str_split($str[$l]);
        $a = strlen($str[$l]);
        $b = $a-1;
        $kata = $this->kata();
        $arr = str_split($kata);
        $j = strlen($kata);
        $s = $j-$a;
        $i = 0;
        while ($i <= $s) {
            $c = $b;
            for ($e=$c; $e >= 0; $e--) { 
               if ( $arr[$i+$e] ==  $ar[$e]) {
               } else {
                break;
               }
            }
            if ($e == -1) {
                $d = $d+1;
                $h[$d] = $i + $b;
                $i = $i + $a;
            }  else {
                for ($g=$e; $g >= 0 ; $g--) { 
                    if ($arr[$i+$g] <> $ar[$g])
                    {
                        $i = $i+1;
                    }
                    else{
                        break;
                    }
                    
                }
            }
        }
    }
        return $h;
    }

    public function cari($cari)
    {
        
        $n = 0;
        $h = $this->cek($cari);
        $z = count($h);
        $data3[0] = 0;
        $data = $this->perusahaan->allData();
        $data1 = $this->perusahaan->jumlahData();
        for ($u=1; $u < $z; $u++) { 
            $data2 = str_replace(' ', '',  $data[0]->nama);
                $a = strlen($data2);
            for ($i=1; $i <= $data1; $i++) {
                if ($h[$u] <= $a) {
                    $data3[$n] = $data[$i-1];
                    $n = $n + 1;
                    break;
                }
                    $data2 = str_replace(' ', '',  $data[$i]->nama);
                    $x = strlen($data2);
                    $a = $a + $x + 1;
            }
        }
        $hasil = array_values (array_map ("unserialize", array_unique (array_map ("serialize", $data3))));
        return $hasil;
    }

    public function Search(Request $request)
    {
        // $cari = $request->cari;
        // $data = [
        //     'lowongan' =>$this->lowongan->cariData($cari),
        // ];
        // return view('user/user',$data);
        $inputSearch=$request['inputSearch'];
        $keyResult = $this->cari($inputSearch);
        echo json_encode($keyResult);
    }

    public function detail($id_perusahaan)
    {
        $data = [
            'perusahaan' => $this->perusahaan->detailData($id_perusahaan),
        ];

        return view('user/v_detailperusahaan', $data);
    }

    public function validasi(Request $request)
    {
        $request->validate([
            'fotodepan' => 'required|mimes:png,jpg,jpeg,bpm,pdf|max:2048',
            'fotokiri' => 'mimes:png,jpg,jpeg,bpm|max:2048',
            'fotokanan' => 'mimes:png,jpg,jpeg,bpm|max:2048',
            'fotobelakang' => 'mimes:png,jpg,jpeg,bpm|max:2048',
            'fotodalam' => 'mimes:png,jpg,jpeg,bpm|max:2048',
            'nib' => 'required|mimes:pdf',
            'npwp' => 'required',
            'ktp' => 'required|mimes:pdf,png,jpg,jpeg,bpm',
            'pkp' => 'max:3000',
        ],[
            'npwp.required'=>'NPWP Wajib terisi',
            'nib.required'=>'NIB Wajib terisi',
            'nib.mimes'=>'NIB harus format PDF',
            'ktp.required'=>'ktp Wajib terisi',
            'ktp.mimes'=>'ktp harus format pdf,png,jpg,jpeg,bpm ',
            'fotodepan.required'=>'Foto Depan Kantor Wajib terisi',
            'fotodepan.mimes'=>'Foto Depan Kantor Harus Format png,jpg,jpeg,bpm',
            'fotodepan.max'=>'Foto maksimal berukuran 2048kb',
            'fotokiri.mimes'=>'Foto Sisi Kiri Kantor Harus Format png,jpg,jpeg,bpm',
            'fotokiri.max'=>'Foto maksimal berukuran 2048kb',
            'fotokanan.mimes'=>'Foto Sisi kanan Kantor Harus Format png,jpg,jpeg,bpm',
            'fotokanan.max'=>'Foto maksimal berukuran 2048kb',
            'fotobelakang.mimes'=>'Foto Sisi belakang Kantor Harus Format png,jpg,jpeg,bpm',
            'fotobelakang.max'=>'Foto maksimal berukuran 2048kb',
            'fotodalam.mimes'=>'Foto Sisi dalam Kantor Harus Format png,jpg,jpeg,bpm',
            'fotodalam.max'=>'Foto maksimal berukuran 2048kb',
        ]);

        $email = Auth::user()->email;
        $file  = $request->fotodepan;
        $filename = "Fotodepan".$email.'.'.$file->extension();
        $file->move(public_path('verifikasi/fotokantor/fotodepan'),$filename);
        $file1  = $request->ktp;
        $filename1 = "KTP".$email.'.'.$file1->extension();
        $file1->move(public_path('verifikasi/ktp'),$filename1);
        $file2  = $request->nib;
        $filename2 = "NIB".$email.'.'.$file2->extension();
        $file2->move(public_path('verifikasi/nib'),$filename2);
        $id_perusahaan = Auth::user()->id;

        $data = [
            'ktp' => $filename1,
            'nib' => $filename2,
            'npwp' => $request->npwp,
            'fotodepan' => $filename,
            'verifikasi' => 0,
        ];
        if ($request->pkp <> "") {
            $file3  = $request->pkp;
            $filename3 = "PKP".$email.'.'.$file3->extension();
            $file3->move(public_path('verifikasi/pkp'),$filename3);
    
            $data['pkp'] = $filename3;
        }
        if ($request->fotokiri <> null)
        {
            $file4  = $request->fotokiri;
            $filename4 = "FOTOKIRI".$email.'.'.$file4->extension();
            $file4->move(public_path('verifikasi/fotokantor/fotokiri'),$filename4);
    
            $data['fotokiri'] = $filename4;
           
        }

        if ($request->fotokanan <> null)
        {
            $file5  = $request->fotokanan;
            $filename5 = "FOTOkanan".$email.'.'.$file5->extension();
            $file5->move(public_path('verifikasi/fotokantor/fotokanan'),$filename5);
    
            $data['fotokanan'] = $filename5;
        }

        if ($request->fotobelakang <> null)
        {
            $file6  = $request->fotobelakang;
            $filename6 = "FOTObelakang".$email.'.'.$file6->extension();
            $file6->move(public_path('verifikasi/fotokantor/fotobelakang'),$filename6);
    
            $data['fotobelakang'] = $filename6;
        }
        if ($request->fotodalam <> null)
        {
            $file7  = $request->fotodalam;
            $filename7 = "fotodalam".$email.'.'.$file7->extension();
            $file7->move(public_path('verifikasi/fotokantor/fotodalam'),$filename7);
    
            $data['fotodalam'] = $filename7;

        }
        $this->perusahaan->editData($id_perusahaan, $data);

       
        return redirect()->back();
    }

    public function download1($akta)
    {
        return response()->download(public_path('akta').'/'.$akta);
    }

    public function download2($pkp)
    {
        return response()->download(public_path('pkp').'/'.$pkp);
    }

    public function download3($nib)
    {
        return response()->download(public_path('nib').'/'.$nib);
    }
    
}



