<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pengguna;

class PenggunaController extends Controller
{
    public function awal()
    {
    	//return "Hello dari PenggunaController";
        return view('pengguna.awal',['data'=>Pengguna::all()]);
    }
    public function tambah()
    {
    	//return $this->simpan();
        return view('pengguna.tambah');
    }
    public function simpan(Request $input)
    {
    	// $pengguna = new Pengguna();
    	// $pengguna->username = 'jon_doe';
    	// $pengguna->password = 'doe_jon';
    	// $pengguna->save();
    	// return "Data dengan username {$pengguna->username} telah disimpan";
        
        $pengguna = new Pengguna;
        $pengguna->username = $input->username;
        $pengguna->password = $input->password;
        $informasi = $pengguna->save() ? 'Berhasil Simpan Data' : 'Gagal simpan data';
        return redirect('pengguna')->with(['informasi'=>$informasi]);
    }
    public function edit($id)
    {
        $pengguna = Pengguna::find($id);
        return view('pengguna.edit')->with(array('pengguna'=>$pengguna));
    }
    public function lihat($id)
    {
        $pengguna = Pengguna::find($id);
        return view('pengguna.lihat')->with(array('pengguna'=>$pengguna));
    }
    public function update($id, Request $input)
    {

        $pengguna = Pengguna::find($id);
        $pengguna->username = $input->username;
        $pengguna->password = $input->password;
        $informasi = $pengguna->save() ? 'Berhasil update data' :'Gagal Update data';
        return redirect('pengguna')->with(['informasi'=>$informasi]);
    }
    public function hapus($id)
    {
        $pengguna = Pengguna::find($id);
        $informasi = $pengguna->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
        return redirect('pengguna')->with(['informasi'=>$informasi]);
    }
}
