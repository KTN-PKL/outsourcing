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
            $data = [
                'name' => $name,
            ];
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
        // $request->validate([
        //     'fotokantor' => 'required|mimes:png,jpg,jpeg,bpm|max:2048',
        //     'nib' => 'required',
        //     'npwp' => 'required',
        //     'akta' => 'required|mimes:pdf|max:3000',
        //     'pkp' => 'mimes:pdf|max:3000',
        // ]);

        $email = Auth::user()->email;
        $file  = $request->fotokantor;
        $filename = "Foto".$request->email.'.'.$file->extension();
        $file->move(public_path('fotokantor'),$filename);
        $file1  = $request->aktar;
        $filename1 = "Akta".$request->email.'.'.$file->extension();
        $file1->move(public_path('aktar'),$filename1);
       
        $id_perusahaan = Auth::user()->id;
        if ($request->pkp == "") {
        
           $data = [
               'akta' => $filename1,
               'nib' => $request->nib,
               'npwp' => $request->npwp,
               'fotokantor' => $filename,
           ];
        } else {
        
            $file2  = $request->pkp;
            $filename2 = "PKP".$request->email.'.'.$file->extension();
            $file2->move(public_path('pkp'),$filename2);
    
            $data = [
                'akta' => $filename1,
                'nib' => $request->nib,
                'npwp' => $request->npwp,
                'fotokantor' => $filename,
                'pkp' => $filename2,
            ];
        }
        $data1  = [
            'status' => 0,
        ];
        $this->perusahaan->editData($id_perusahaan, $data);
        $this->m_user->editData($id_perusahaan, $data1);
        return redirect()->back();
    }
    
}



