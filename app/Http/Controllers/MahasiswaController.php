<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mahasiswa;
use App\Pengguna;

class MahasiswaController extends Controller
{
protected $informasi = 'Gagal Melakukan Aksi';
   public function awal()
    {
    	//return "Hello dari MahasiswaController";
        $semuaMahasiswa = Mahasiswa::all();
        return view('mahasiswa.awal',compact('semuaMahasiswa'));
        // return view('mahasiswa.awal',['data'=>Mahasiswa::all()]);
    }

    public function tambah()
    {
    	//return $this->simpan();
        return view('mahasiswa.tambah');
    }

    public function simpan(Request $input)
    {
    	// $mahasiswa = new Mahasiswa();
    	// $mahasiswa->nama = 'Ferry Miechel Lubis';
    	// $mahasiswa->nim = '1515015111';
    	// $mahasiswa->alamat = 'Jalan Pramuka 19 Blok D';
    	// $mahasiswa->pengguna_id = 1;
    	// $mahasiswa->save();
    	// return "Data dengan nama mahasiswa {$mahasiswa->nama} telah disimpan";

        // $mahasiswa = new Mahasiswa;
        // $mahasiswa->nama = $input->nama;
        // $mahasiswa->nim = $input->nim;
        // $mahasiswa->alamat = $input->alamat;
        // $mahasiswa->pengguna_id = $input->pengguna_id;
        // $informasi = $mahasiswa->save() ? 'Berhasil Simpan Data' : 'Gagal simpan data';
        // return redirect('mahasiswa')->with(['informasi'=>$informasi]);

        $pengguna = new Pengguna($input->only('username','password'));
        if ($pengguna->save()) {
            $mahasiswa = new Mahasiswa;
            $mahasiswa->nama = $input->nama;
            $mahasiswa->nim = $input->nim;
            $mahasiswa->alamat = $input->alamat;
            if ($pengguna->mahasiswa()->save($mahasiswa)) $this->informasi ='Berhasil Simpan Data';
        }
        return redirect('mahasiswa')->with(['informasi'=>$this->informasi]);
    }


    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit')->with(array('mahasiswa'=>$mahasiswa));
    }

    public function lihat($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.lihat')->with(array('mahasiswa'=>$mahasiswa));
    }

   public function update($id, Request $input)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama = $input->nama;
        $mahasiswa->nim = $input->nim;
        $mahasiswa->alamat = $input->alamat;
        $mahasiswa->save();
        // $mahasiswa->pengguna_id = $input->pengguna_id;
        if(!is_null($input->username)){
            $pengguna=$mahasiswa->pengguna->fill($input->only('username'));
                if(!empty($input->password)) $pengguna->password = $input->password;
        // $mahasiswa = Mahasiswa::find($id);
        // $mahasiswa->nama = $input->nama;
        // $mahasiswa->nim = $input->nim;
        // $mahasiswa->alamat = $input->alamat;
                if($pengguna->save()) $this->informasi = 'Berhasil update data';
        }
        else{
            $this->informasi = 'Berhasil simpan data 2';
        }
        // $informasi = $mahasiswa->save() ? 'Berhasil update data': 'Gagal update data';
        return redirect('mahasiswa') -> with (['informasi'=>$this->informasi]);
    }

    // public function update($id, Request $input)
    // {
    //     $mahasiswa = Mahasiswa::find($id);
    //     $mahasiswa->nama = $input->nama;
    //     $mahasiswa->nim = $input->nim;
    //     $mahasiswa->alamat = $input->alamat;
    //     // $mahasiswa->pengguna_id = $input->pengguna_id;
    //     if(!is_null($input->username)){
    //         $pengguna=$mahasiswa->pengguna->fill($input->only('username'));
    //         if (!empty($input->password)) $pengguna->password=$input->password;
    //          if ($pengguna->save()) $this->informasi='Berhasil simpan data 1';
    //     }else{
    //         $this->informasi='Berhasil simpan data 2';
    //     }
    //     return redirect('mahasiswa')->with(['informasi' => $this->informasi]);
    // }

     public function hapus($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if($mahasiswa->pengguna()->delete()){
            if($mahasiswa->delete()) $this->informasi = 'Berhasil hapus data';
            return redirect('mahasiswa')-> with(['informasi'=>$this->informasi]);
        }
        // $informasi = $mahasiswa->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
        // return redirect('mahasiswa')-> with(['informasi'=>$this->informasi]);
    }
}