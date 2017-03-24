<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ruangan;

class RuanganController extends Controller
{
    public function awal()
    {
    	//return "Hello dari RuanganController";
        return view('ruangan.awal',['data'=>Ruangan::all()]);

    }
    public function tambah()
    {
    	//return $this->simpan();
        return view('ruangan.tambah');
    }
    public function simpan(Request $input)
    {
    	/*$ruangan = new Ruangan();
    	$ruangan->title = 'Ruang Robotik';
    	$ruangan->save();
    	return "Data dengan nama ruangan {$ruangan->title} telah disimpan";*/
        $ruangan = new Ruangan;
        $ruangan->title = $input->title;
        $informasi = $ruangan->save() ? 'Berhasil Simpan Data' : 'Gagal simpan data';
        return redirect('ruangan')->with(['informasi'=>$informasi]);
    }
    public function edit($id)
    {
        $ruangan = Ruangan::find($id);
        return view('ruangan.edit')->with(array('ruangan'=>$ruangan));
    }
    public function lihat($id)
    {
        $ruangan = Ruangan::find($id);
        return view('ruangan.lihat')->with(array('ruangan'=>$ruangan));
    }
    public function update($id, Request $input)
    {
        $ruangan = Ruangan::find($id);
        $ruangan->title = $input->title;
        $informasi = $ruangan->save() ? 'Berhasil update data' :'Gagal Update data';
        return redirect('ruangan')->with(['informasi'=>$informasi]);
    }
    public function hapus($id)
    {
        $ruangan = Ruangan::find($id);
        $informasi = $ruangan->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
        return redirect('ruangan')->with(['informasi'=>$informasi]);
    }
}